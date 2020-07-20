<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;

class MinistriesController extends Controller
{
    public function getAllMinistries(){
        $all_minstries = Ministry::all();
        return $all_minstries;
    }
}
