<?php

namespace App\Http\Services\FuelType;

use App\Models\FuelType;
use App\Http\Request\FuelType\AddFuelTypeRequest;

class FuelTypeAdService
{
    public function addFuelType(AddFuelTypeRequest $request)
    {
        $fuelType = new FuelType();
        $fuelType->name = $request->name;
        if ($fuelType->save()) {
            return true;
        }
        return redirect()->back()->with('error', 'Thêm loại nhiên liệu thất bại');
    }
    public function updateFuelType(AddFuelTypeRequest $request, $id)
    {
        $fuelType = FuelType::find($id);
        $fuelType->name = $request->name;
        if ($fuelType->save()) {
            return true;
        }
        return redirect()->back()->with('error', 'Cập nhật loại nhiên liệu thất bại');
    }
    public function deleteFuelType($id)
    {
        $fuelType = FuelType::find($id);
        if ($fuelType->delete()) {
            return true;
        }
        return redirect()->back()->with('error', 'Xóa loại nhiên liệu thất bại');
    }
}
