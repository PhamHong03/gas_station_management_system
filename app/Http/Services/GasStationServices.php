<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\GasStation\GasStationRequest;
use App\Models\GasStation;

class GasStationServices
{
    private const EARTH_RADIUS = 6371000;
    private const DISTANCE_CACHE_TIME = 60;
    private const OSRM_TIMEOUT = 3;
    private const RADIUS_BUFFER = 1.5;

    public function findNear(GasStationRequest $request)
    {
        $validatedData = $request->validated();
        $radius = isset($validatedData['radius']) ? $validatedData['radius'] * 1000 : null;
        
        $query = GasStation::query()
            ->with('reviews');

        // Chỉ lọc theo fuel_type và operation_time nếu radius null
        if ($radius === null) {
            if (isset($validatedData['fuel_type'])) {
                $query->whereHas('gasStationFuel', fn($q) => $q->where('FuelTypeId', $validatedData['fuel_type']))
                      ->with(['gasStationFuel' => fn($q) => $q->where('FuelTypeId', $validatedData['fuel_type'])]);
            }

            if (isset($validatedData['operation_time'])) {
                $query->where('operation_time', $validatedData['operation_time']);
            }

            return $query->get();
        }

        // Xử lý khi có radius
        $initialRadius = $radius * self::RADIUS_BUFFER;

        $query->select('*')
            ->selectRaw(
                '(? * ACOS(COS(RADIANS(?)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS(?)) + SIN(RADIANS(?)) * SIN(RADIANS(latitude)))) AS approx_distance',
                [self::EARTH_RADIUS, $validatedData['latitude'], $validatedData['longitude'], $validatedData['latitude']]
            )
            ->having('approx_distance', '<=', $initialRadius)
            ->orderBy('approx_distance');

        if (isset($validatedData['fuel_type'])) {
            $query->whereHas('gasStationFuel', fn($q) => $q->where('FuelTypeId', $validatedData['fuel_type']))
                  ->with(['gasStationFuel' => fn($q) => $q->where('FuelTypeId', $validatedData['fuel_type'])]);
        }

        if (isset($validatedData['operation_time'])) {
            $query->where('operation_time', $validatedData['operation_time']);
        }

        $stations = $query->get();

        return $this->calculateFinalDistances(
            $stations,
            $validatedData['latitude'],
            $validatedData['longitude'],
            $radius
        );
    }

    protected function calculateFinalDistances($stations, $originLat, $originLng, $targetRadius)
    {
        return $stations->map(function($station) use ($originLat, $originLng, $targetRadius) {
            $distance = $this->getDrivingDistance(
                $originLat,
                $originLng,
                $station->latitude,
                $station->longitude
            );

            $station->driving_distance = $distance;
            $station->is_within_radius = $distance <= $targetRadius;

            return $station;
        })->filter(fn($s) => $s->is_within_radius)
          ->sortBy('driving_distance')
          ->values();
    }

    protected function getDrivingDistance($lat1, $lng1, $lat2, $lng2)
    {
        $cacheKey = sprintf('driving_dist:%F:%F:%F:%F', $lat1, $lng1, $lat2, $lng2);

        return Cache::remember($cacheKey, self::DISTANCE_CACHE_TIME, function() use ($lat1, $lng1, $lat2, $lng2) {
            $url = sprintf(
                'https://router.project-osrm.org/route/v1/driving/%F,%F;%F,%F?overview=false',
                $lng1, $lat1, $lng2, $lat2
            );

            try {
                $response = Http::timeout(self::OSRM_TIMEOUT)->get($url);
                
                if ($response->successful() && !empty($data = $response->json())) {
                    return $data['routes'][0]['distance'] ?? PHP_INT_MAX;
                }
                return PHP_INT_MAX;
            } catch (\Exception $e) {
                \Log::error("OSRM Error: " . $e->getMessage());
                return PHP_INT_MAX;
            }
        });
    }
}