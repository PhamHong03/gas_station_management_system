<?php

namespace App\Http\Controllers\Maps;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\GasStation\GasStationRequest;
use App\Http\Services\GasStationServices;
use Illuminate\Http\Request;

class GasStationController extends Controller {
    protected $gasStationServices;

    public function __construct(GasStationServices $gasStationServices)
    {
        $this->gasStationServices = $gasStationServices;
    }

    public function findNearestGasStations()
    {
        $this->gasStationServices->findNear();

        return ;
    }
    public function findGasStationsByLocation()
    {
        $this->gasStationServices->findNearByRadius();

        return ;
    }
}