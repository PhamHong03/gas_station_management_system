<?php

namespace App\Http\Controllers\Admin;

use App\Models\Price;
use App\Models\Company;
use App\Models\FuelType;
use App\Http\Controllers\Controller;
use App\Http\Request\Price\AddPriceRequest;
use App\Http\Services\Price\PriceAdService;

class PriceController extends Controller
{
    private $priceAdService;
    public function __construct(PriceAdService $priceAdService)
    {
        $this->priceAdService = $priceAdService;
    }
    public function list()
    {
        $prices = Price::all();
        return view('admin.price.list', compact('prices'));
    }
    public function create()
    {
        $companies = Company::all();
        $fuelTypes = FuelType::all();
        return view('admin.price.create', compact('fuelTypes', 'companies'));
    }
    public function store(AddPriceRequest $request)
    {
        if ($this->priceAdService->addPrice($request)) {
            return redirect()->route('admin.fuel-prices.list');
        }
        return redirect()->back();
    }
    public function edit($id)
    {
        $price = Price::find($id);
        $fuelTypes = FuelType::all();
        $companies = Company::all();
        return view('admin.price.edit', compact('price', 'fuelTypes', 'companies'));
    }
    public function update(AddPriceRequest $request, $id)
    {
        if ($this->priceAdService->updatePrice($request, $id)) {
            return redirect()->route('admin.fuel-prices.list');
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        if ($this->priceAdService->deletePrice($id)) {
            return redirect()->route('admin.fuel-prices.list');
        }
        return redirect()->back();
    }


}
