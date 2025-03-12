<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Auth;
use Session;

class CompanyController extends Controller{
    public function index(){
        $company = Company::where('UserId', Auth::id())->get();
        return view('company.index', compact('company'));
    }

}
