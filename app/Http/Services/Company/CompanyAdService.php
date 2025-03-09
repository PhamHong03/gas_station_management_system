<?php

namespace App\Http\Services\Company;

use App\Models\Company;

class CompanyAdService
{
    public function createCompanyAd($request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();
        return true;
    }
    public function updateCompanyAd($request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();
        return true;
    }
    public function deleteCompanyAd($id)
    {
        $company = Company::find($id);
        $company->delete();
        return true;
    }
}
