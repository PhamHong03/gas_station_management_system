<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Ward;

class LocationController extends Controller
{
    public function getDistricts($cityId)
    {
        $districts = District::where('CityId', $cityId)->get();
        return response()->json($districts);
    }

    public function getWards($districtId)
    {
        $wards = Ward::where('DistrictId', $districtId)->get();
        return response()->json($wards);
    }
}
