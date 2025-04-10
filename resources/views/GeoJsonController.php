<?php

namespace App\Http\Controllers;

use App\Models\District;

class GeoJsonController extends Controller
{
    public function generateGeoJson()
    {
        $districts = District::all();

        $geoJson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($districts as $district) {
            $coordinates = json_decode($district->coordinates); // Chuyển đổi chuỗi JSON thành mảng
            $geoJson['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $district->id,
                    'name' => $district->name,
                ],
                'geometry' => [
                    'type' => 'Polygon',
                    'coordinates' => [$coordinates], // GeoJSON yêu cầu tọa độ polygon
                ],
            ];
        }

        return response()->json($geoJson);
    }
}