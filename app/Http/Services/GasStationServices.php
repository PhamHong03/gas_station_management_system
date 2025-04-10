<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\GasStation\GasStationRequest;
use App\Models\GasStation;
use App\Models\GasStationFuel;


class GasStationServices
{
    public function findNear(GasStationRequest $request)
    {
        $validatedData = $request->validated();
        $latitude = $validatedData['latitude'];
        $longitude = $validatedData['longitude'];
        $radius = ($validatedData['radius'] ?? 5) * 1000;
        $fuelType = $validatedData['fuel_type'] ?? null;
        $operationTime = $validatedData['operation_time'] ?? null;

        $stations = GasStation::with(['reviews', 'gasStationFuel']);

        if ($fuelType) {
            $stations = $stations->whereHas('gasStationFuel', function($query) use ($fuelType) {
                $query->where('FuelTypeId', $fuelType);
            });
        }

        if ($operationTime) {
            $stations = $stations->where('operation_time', $operationTime);
        }

        $stations = $stations->get();

        $nearbyStations = [];

        foreach ($stations as $index => $station) {
            $url = "https://router.project-osrm.org/route/v1/driving/{$longitude},{$latitude};{$station->longitude},{$station->latitude}?overview=false";
        
            try {
                $response = Http::get($url);
                $data = $response->json();
        
                if (!empty($data['routes'][0])) {
                    $drivingDistance = $data['routes'][0]['distance'];
        
                    if ($drivingDistance <= $radius) {
                        $nearbyStations[] = $station;
                    }
                }
            } catch (\Exception $e) {
                \Log::error("Error fetching distance for station {$station->id}: " . $e->getMessage());
                continue;
            }
        }

        return $nearbyStations;
    }
}
