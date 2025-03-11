<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\GasStationFuel\GasStationFuelAdService;
use App\Http\Request\GasStationFuel\AddGasStationFuelRequest;

class GasStationFuelController extends Controller{
    private $gasStationFuelAdService;
    public function __construct(GasStationFuelAdService $gasStationFuelAdService){
        $this->gasStationFuelAdService = $gasStationFuelAdService;
    }
}

