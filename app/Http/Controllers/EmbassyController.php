<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Embassy;

class EmbassyController extends Controller
{
    public function getAllEmbassies(){
        $all_embassies = Embassy::all();
        return $all_embassies;
    }
}
