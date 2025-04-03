<?php

namespace App\Http\Services\Price;

use App\Models\Price;
use App\Http\Request\Price\AddPriceRequest;

class PriceAdService
{
    public function addPrice(AddPriceRequest $request)
    {
        $price = new Price();
        $price->FuelTypeId = $request->FuelTypeId;
        $price->price = $request->price;
        $price->CompanyId = $request->CompanyId;
        $price->start_date = $request->start_date;
        if ($price->save()) {
            return true;
        }
        return false;
    }

    public function updatePrice(AddPriceRequest $request, $id)
    {
        $price = Price::find($id);
        $price->FuelTypeId = $request->FuelTypeId;
        $price->price = $request->price;
        $price->CompanyId = $request->CompanyId;
        $price->start_date = $request->start_date;
        if ($price->save()) {
            return true;
        }
        return false;
    }

    public function deletePrice($id)
    {
        $price = Price::find($id);
        if ($price->delete()) {
            return true;
        }
        return false;
    }
}