<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Ward;
use App\Models\Company;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\Company\AddCompanyRequest;
use App\Http\Services\Company\CompanyAdService;

class CompanyController extends Controller
{
    private $companyAdService;
    public function __construct(CompanyAdService $companyAdService)
    {
        $this->companyAdService = $companyAdService;
    }
    public function list()
    {
        $companies = Company::all();
        $users = User::all();
        return view('admin.companies.list', compact('companies'));
    }
    public function create()
    {
        $users = User::all();
        $cities = City::all();
        return view('admin.companies.create' , compact('users', 'cities'));
    }
    public function store(AddCompanyRequest $request)
    {
        $this->companyAdService->createCompanyAd($request);
        return redirect()->route('admin.companies.list');
    }
    public function edit($id)
    {
        $company = Company::find($id);
        $ward = Ward::find($company->WardId);
        $districts = District::find($ward->DistrictId);
        $citi = City::find($districts->CityId);
        $cities = City::all();
        $users = User::all();
        return view('admin.companies.edit', compact('company', 'users', 'cities', 'districts', 'citi', 'ward'));
    }
    public function update(AddCompanyRequest $request, $id)
    {
        $this->companyAdService->updateCompanyAd($request, $id);
        return redirect()->route('admin.companies.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $this->companyAdService->deleteCompanyAd($id);
        return redirect()->route('admin.companies.list')->with('success', 'Xóa thành công');
    }

}
