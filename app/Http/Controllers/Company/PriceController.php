<?php
namespace App\Http\Controllers\Company;

use App\Models\Price;
use App\Models\Company;
use App\Models\FuelType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\Price\AddPriceRequest;
use App\Http\Services\Price\PriceCpnService;

class PriceController extends Controller{
    private $priceAdService;
    public function __construct(PriceCpnService $priceAdService)
    {
        $this->priceAdService = $priceAdService;
    }
    public function list()
    {
        $company = Company::where('UserId' , Auth::id())->first();
        $prices = Price::where('CompanyId' ,$company->id)->get();
        return view('company.price.list', compact('prices'));
    }
    public function create()
    {
        $company = Company::where('UserId' , Auth::id())->first();
        $fuelTypes = FuelType::all();
        return view('company.price.create', compact('fuelTypes', 'company'));
    }
    public function store(AddPriceRequest $request)
    {
        if ($this->priceAdService->addPrice($request)) {
            return redirect()->route('company.fuel-prices.list');
        }
        return redirect()->back()->with('message', 'Đã thêm thành công');
    }
    public function edit($id)
    {
        $price = Price::find($id);
        $fuelTypes = FuelType::all();
        $companies = Company::all();
        return view('company.price.edit', compact('price', 'fuelTypes', 'companies'));
    }
    public function update(AddPriceRequest $request, $id)
    {
        if ($this->priceAdService->updatePrice($request, $id)) {
            return redirect()->route('company.fuel-prices.list');
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        if ($this->priceAdService->deletePrice($id)) {
            return redirect()->route('company.fuel-prices.list');
        }
        return redirect()->back();
    }

}
