<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
