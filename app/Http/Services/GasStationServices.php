<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GasStationServices{
    public function findNear() {
        // $request->validate([
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'radius' => 'nullable|numeric|min:0' // Bán kính tìm kiếm (km), mặc định 5km
        // ]);

        $latitude = 10.046516764552752;
        $longitude = 105.77850438052799;
        $radius = 5; // Bán kính mặc định là 5km
        
        $gasStations = DB::table('gas_stations')
            ->selectRaw("
            id, name, address, phone, longitude, latitude,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) 
            * cos(radians(longitude) - radians(?)) + sin(radians(?)) 
            * sin(radians(latitude)))) AS distance
        ", [$latitude, $longitude, $latitude])
            ->having('distance', '<=', $radius)
            ->orderBy('distance', 'asc')
            ->get();


        echo ($gasStations);
        return response()->json($gasStations, 200, [], JSON_UNESCAPED_UNICODE);

    }
    public function findNearByRadius() {

        $query = '
        [out:json];
        way(around:500, 10.776, 106.700)["highway"];
        (._;>;);
        out;
        ';
        
        $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
                        ->post('https://overpass-api.de/api/interpreter', $query);
        
       return $response->json();
        
    }
}