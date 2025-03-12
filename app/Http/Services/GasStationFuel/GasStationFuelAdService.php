<?php
namespace App\Http\Services\GasStationFuel;

use App\Http\Request\GasStationFuel\AddGasStationFuelRequest;
use App\Models\GasStationFuel;

class GasStationFuelAdService{
    public function store(AddGasStationFuelRequest $request){
        $gasStationFuel = new GasStationFuel();
        $gasStationFuel->fill($request->all());
        if($gasStationFuel->save()) return true;
        return redirect()->back()->with('error', 'Thêm mới thất bại');
    }
    public function update($id, AddGasStationFuelRequest $request){
        $gasStationFuel = GasStationFuel::find($id);
        if($gasStationFuel->update($request->all())) return true;
        return redirect()->back()->with('error', 'Cập nhật thất bại');
    }
    public function delete($id){
        $gasStationFuel = GasStationFuel::find($id);
        if($gasStationFuel->delete()) return true;
        return redirect()->back()->with('error', 'Xóa thất bại');
    }

}
