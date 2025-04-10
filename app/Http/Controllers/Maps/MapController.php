<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Models\GasStation;
use App\Models\FuelType; // Thêm import FuelType model
use App\Http\Services\GasStationServices;
use App\Http\Requests\GasStation\GasStationRequest;
use Illuminate\Http\Request;

class MapController extends Controller
{


    public function index(Request $request)
    {
        
        $fuelTypes = FuelType::all();
        $operationTimes = GasStation::select('operation_time')
            ->distinct()
            ->whereNotNull('operation_time')
            ->where('operation_time', '!=', '')
            ->pluck('operation_time');

        if ($request->has('search')) {
            // Validate and process search
            $validatedRequest = app(\App\Http\Requests\GasStation\GasStationRequest::class);
            $gasStations = $this->findNearestGasStations($validatedRequest);
            
            // Trả về view với các giá trị đã chọn
            return view('clients.layouts.homepage', [
                'gasStations' => $gasStations,
                'fuelTypes' => $fuelTypes,
                'selectedFuelType' => $request->fuel_type, // Thêm giá trị đã chọn
                'operationTimes' => $operationTimes,
                'selectedTime' => $request->operation_time // Thêm giá trị đã chọn
            ]);
        }
        else{
            $gasStations = GasStation::with('reviews')->get();
            return view('clients.layouts.homepage', compact('gasStations', 'fuelTypes', 'operationTimes'));
        }

       
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
