<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected function getContracts(){
        return view('admin.contracts');
    }
}