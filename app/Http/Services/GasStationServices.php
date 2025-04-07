<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\GasStation\GasStationRequest;
use App\Models\GasStation;
use App\Models\GasStationFuel;


class GasStationServices{
    public function findNear(GasStationRequest $request) {
  
        $validatedData = $request->validated();
        $latitude = $validatedData['latitude'];
        $longitude = $validatedData['longitude'];
        $radius = $validatedData['radius'] ?? 5; // Bán kính mặc định
        $fuelType = $validatedData['fuel_type'] ?? null;
        $operationTime = $validatedData['operating_hours'] ?? null;
        
       $query = DB::table('gas_stations as g')
        ->join('gastation_fuel_type as gf', 'g.id', '=', 'gf.GasStationId')
        ->selectRaw("
            DISTINCT g.id, g.name, g.address, g.phone, g.longitude, g.latitude, g.operation_time,
            (6371 * ACOS(
                COS(RADIANS(?)) * COS(RADIANS(g.latitude)) 
                * COS(RADIANS(g.longitude) - RADIANS(?)) 
                + SIN(RADIANS(?)) * SIN(RADIANS(g.latitude))
            )) AS distance", [$latitude, $longitude, $latitude])
        ->having('distance', '<=', $radius)
        ->orderBy('distance', 'asc');

        // Áp dụng điều kiện lọc nếu có
        if ($fuelType) {
            $query->where('gf.FuelTypeId', $fuelType);
        }

       

        $gasStations = $query->get();
    
        return response()->json($gasStations, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_UNICODE);
    }
}