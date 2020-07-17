<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    protected function getGeneralMap(){
        return view('admin.general_map');
    }
}
