<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Models\FuelType;
use App\Models\GasStation;

class MapController extends Controller
{
    // public function index(){

    //     return view('clients.layouts.homepage');
    // }

    public function index()
    {
        $gasStations = GasStation::with('reviews')->get();
        $fuelTypes = FuelType::all();

        return view('clients.layouts.homepage', compact('gasStations', 'fuelTypes'));
    }
}
