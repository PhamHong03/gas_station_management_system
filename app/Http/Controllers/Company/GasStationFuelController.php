<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Services\GasStationFuel\GasStationFuelAdService;
use App\Http\Request\GasStationFuel\AddGasStationFuelRequest;
use App\Models\FuelType;
use App\Models\GasStation;
use App\Models\GasStationFuel;

class GasStationFuelController extends Controller{
    private $gasStationFuelAdService;
    public function __construct(GasStationFuelAdService $gasStationFuelAdService){
        $this->gasStationFuelAdService = $gasStationFuelAdService;
    }
    public function list($id){
        $gasStation = GasStation::find($id);
        $gasStationFuels = GasStationFuel::where('GasStationId', $id)->get();
        return view('company.gas-station-fuel.list', compact('gasStationFuels', 'gasStation'));
    }
    public function create($id) {
        $gasStation = GasStation::find($id);
        $existingFuelIds = GasStationFuel::where('GasStationId', $id)->pluck('FuelTypeId')->toArray();
        $fuelTypes = FuelType::whereNotIn('id', $existingFuelIds)->get();
        return view('company.gas-station-fuel.create', compact('gasStation', 'fuelTypes'));
    }

    public function store(AddGasStationFuelRequest $request){
        $this->gasStationFuelAdService->store($request);
        return redirect()->route('company.gas-station-fuel.list' , ['id'=> $request->GasStationId])->with('success', 'Thêm Nhiên liệu cho trạm xăng thành công');
    }
    public function edit($id){
        $gasStation = GasStation::find($id);
        $existingFuelIds = GasStationFuel::where('GasStationId', $id)->pluck('FuelTypeId')->toArray();
        $fuelTypes = FuelType::whereNotIn('id', $existingFuelIds)->get();
        return view('company.gas-station-fuel.edit', compact('gasStationFuel', 'gasStation', 'fuelTypes'));
    }
    public function update(AddGasStationFuelRequest $request, $id){
        $this->gasStationFuelAdService->update($request,$id);
        return redirect()->route('company.gas-station-fuel.list')->with('success', 'Cập nhật nhiên liệu thành công');
    }
    public function delete($id){
        $gasStation = GasStationFuel::find($id);
        $this->gasStationFuelAdService->delete($id);
        return redirect()->route('company.gas-station-fuel.list' , ['id'=> $gasStation ->GasStationId])->with('success', 'Xóa thành công');
    }
}

