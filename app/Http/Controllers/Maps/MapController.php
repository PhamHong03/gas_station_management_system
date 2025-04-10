<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GasStation;
use App\Models\FuelType; // Thêm import FuelType model
use App\Http\Services\GasStationServices;
use App\Http\Requests\GasStation\GasStationRequest;

class MapController extends Controller
{
    public function index(Request $request)
    {
        // Get all gas stations with their reviews
        $gasStations = GasStation::with('reviews')->get();

        // Get operation times
        $operationTimes = GasStation::select('operation_time')
            ->distinct()
            ->whereNotNull('operation_time')
            ->where('operation_time', '!=', '')
            ->pluck('operation_time');

        // Get all fuel types
        $fuelTypes = FuelType::all();

        if ($request->has('search')) {
            // Validate and process search
            $validatedRequest = app(\App\Http\Requests\GasStation\GasStationRequest::class);
            $gasStations = $this->findNearestGasStations($validatedRequest);

            // Return view with stations, operation times and fuel types
            return view('clients.layouts.homepage', [
                'gasStations' => $gasStations,
                'operationTimes' => $operationTimes,
                'fuelTypes' => $fuelTypes
            ]);
        }

        // Return view with all data if no search
        return view('clients.layouts.homepage', [
            'gasStations' => $gasStations,
            'operationTimes' => $operationTimes,
            'fuelTypes' => $fuelTypes
        ]);
    }

    protected $gasStationServices;

    public function __construct(GasStationServices $gasStationServices)
    {
        $this->gasStationServices = $gasStationServices;
    }

    public function findNearestGasStations(GasStationRequest $request)
    {
        return $this->gasStationServices->findNear($request);
    }
}
