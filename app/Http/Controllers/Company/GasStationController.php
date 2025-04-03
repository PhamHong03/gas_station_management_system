<?php

namespace App\Http\Controllers\Company;

use App\Models\City;
use App\Models\Ward;
use App\Models\Company;
use App\Models\District;
use App\Models\GasStation;
use App\Http\Controllers\Controller;
use App\Http\Services\GasStation\GasStationCpnService;
use App\Http\Request\GasStation\AddGasStationRequest;
use App\Http\Requests\GasStation\GasStationRequest;

use Auth;

class GasStationController extends Controller
{
    private $gasStationServer;
    public function __construct(GasStationCpnService $gasStationServer){
        return $this->gasStationServer = $gasStationServer;
    }
    public function list(){
        $company = Company::where('UserId',Auth::id())->first();
        $gasStations= GasStation::where('CompanyId', $company->id)->get();
        return view('company.gas-stations.list', compact('gasStations'));
    }
    public function create(){
        $cities = City::all();
        $company = Company::where('UserId',Auth::id())->first();
        return view('company.gas-stations.create' , compact('cities', 'company'));
    }
    public function store(AddGasStationRequest $request){
        $this->gasStationServer->addGasStation($request);
        return redirect()->route('company.gas-stations.list')->with('success', 'Thêm cây xăng thành công');
    }
    public function edit($id){
        $company = Company::where('UserId',Auth::id())->first();
        $gasStation = GasStation::find($id);
        $ward = Ward::find($gasStation->WardId);
        $districts = District::find($ward->DistrictId);
        $citi = City::find($districts->CityId);
        $cities = City::all();
        return view('company.gas-stations.edit',  compact( 'company','gasStation', 'cities', 'districts', 'citi', 'ward'));
    }
    public function update(AddGasStationRequest $request, $id){
        $this->gasStationServer->update($request, $id);
        return redirect()->route('company.gas-stations.list')->with('success', 'Cập nhật cây xăng thành công');
    }
    public function delete($id){
        $this->gasStationServer->delete($id);
        return redirect()->route('company.gas-stations.list')->with('success', 'Xóa thành công');
    }
  



}
