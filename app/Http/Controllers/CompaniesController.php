<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User as NewCompany;
use App\AbroadCompany as Company;

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

    protected function getAllCompanies(){
        $companies = Company::all();
        return view('admin.companies_to_deployment',compact('companies'));
    }
}
