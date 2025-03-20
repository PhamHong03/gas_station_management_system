<?php

namespace App\Http\Services\Company;

use App\Models\Company;
use App\Http\Request\Company\AddCompanyRequest;

class CompanyAdService
{
    public function createCompanyAd(AddCompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->longitude = $request->longitude;
        $company->latitude = $request->latitude;
        $company->WardId = $request->WardId;
        $company->UserId = $request->UserId;
        if($company->save()) return true;
        return false;
    }

    public function updateCompanyAd(AddCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->longitude = $request->longitude;
        $company->latitude = $request->latitude;
        $company->WardId = $request->WardId;
        $company->UserId = $request->UserId;
        if($company->save()) { return true;}
        return false;
    }

    public function deleteCompanyAd($id)
    {
        $company = Company::find($id);
        $company->delete();
    }
}
