<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as NewCompany;

class CompaniesController extends Controller
{
    protected function getActiveLicenses(){
        return view('admin.active_licenses');
    }

    protected function getExpiredLicenses(){
        return view('admin.expired_licenses');
    }

    protected function getTerminatedLicenses(){
        return view('admin.terminated_licenses');
    }

    public function registerNewCompanyAccount(){
        $company = new NewCompany;
        $company->email = request()->email;
        $company->name  = request()->company_name;
        $company->password = Hash::make(request()->password);
        $company->save();
    }
}
