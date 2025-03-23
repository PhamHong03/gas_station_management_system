<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Models\GasStation;

class MapController extends Controller
{
    public function index(){
        $gasStations = GasStation::all();
        return view('clients.layouts.homepage' , compact('gasStations'));
    }
}