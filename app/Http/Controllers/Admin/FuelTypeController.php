<?php

namespace App\Http\Controllers\Admin;

use App\Models\FuelType;
use App\Http\Request\FuelType\AddFuelTypeRequest;
use App\Http\Services\FuelType\FuelTypeAdService;
use App\Http\Controllers\Controller;

class FuelTypeController extends Controller
{
    private $fuelTypeService;
    public function __construct(FuelTypeAdService $fuelTypeService)
    {
        $this->fuelTypeService = $fuelTypeService;
    }
    public function list()
    {
        $fuelTypes = FuelType::all();
        return view('admin.fuel-types.list', compact('fuelTypes'));
    }

    public function create()
    {
        return view('admin.fuel-types.create');
    }

    public function store(AddFuelTypeRequest $request)
    {
        $this->fuelTypeService->addFuelType($request);
        return redirect()->route('admin.fuel-types.list')->with('success', 'Thêm loại nhiên liệu thành công');
    }

    public function edit($id)
    {
        $fuelType = FuelType::find($id);
        return view('admin.fuel-types.edit', compact('fuelType'));
    }

    public function update(AddFuelTypeRequest $request, $id)
    {
        $this->fuelTypeService->updateFuelType($request, $id);
        return redirect()->route('admin.fuel-types.list')->with('success', 'Cập nhật loại nhiên liệu thành công');
    }

    public function delete($id)
    {
        $this->fuelTypeService->deleteFuelType($id);
        return redirect()->route('admin.fuel-types.list')->with('success', 'Xóa loại nhiên liệu thành công');
    }
}
