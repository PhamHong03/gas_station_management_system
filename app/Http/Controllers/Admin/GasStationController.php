<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Ward;
use App\Models\Company;
use App\Models\District;
use App\Models\GasStation;
use App\Http\Controllers\Controller;
use App\Http\Services\GasStation\GasStationService;
use App\Http\Request\GasStation\AddGasStationRequest;

class GasStationController extends Controller
{
    private $gasStationServer;
    public function __construct(GasStationService $gasStationServer){
        return $this->gasStationServer = $gasStationServer;
    }
    public function list(){
        $gasStations= GasStation::all();
        return view('admin.gas-stations.list', compact('gasStations'));
    }
    public function create(){
        $cities = City::all();
        $companies = Company::all();
        return view('admin.gas-stations.create' , compact('cities', 'companies'));
    }
    public function store(AddGasStationRequest $request){
        $this->gasStationServer->addGasStation($request);
        return redirect()->route('admin.gas-stations.list')->with('success', 'Thêm cây xăng thành công');
    }
    public function edit($id){
        $gasStation = GasStation::find($id);
        $ward = Ward::find($gasStation->WardId);
        $districts = District::find($ward->DistrictId);
        $citi = City::find($districts->CityId);
        $cities = City::all();
        $companies = Company::all();
        return view('admin.gas-stations.edit',  compact( 'gasStation', 'cities', 'districts', 'citi', 'ward', 'companies'));
    }
    public function update(AddGasStationRequest $request, $id){
        $this->gasStationServer->update($request, $id);
        return redirect()->route('admin.gas-stations.list')->with('success', 'Cập nhật cây xăng thành công');
    }
    public function delete($id){
        $this->gasStationServer->delete($id);
        return redirect()->route('admin.gas-stations.list')->with('success', 'Xóa thành công');
    }
}
