<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidatesCurrentLocation as CandidatesCurrentLocationModel;

class CandidatesCurrentLocation extends Controller
{
    protected function registerGirlsCurrentLocation(){
        $current_location = new CandidatesCurrentLocationModel;
        $current_location->candidate_id = request()->candidate_id;
        $current_location->longitude    = request()->longitude;
        $current_location->latitude     = request()->latitude;
        $current_location->save();
    }
}
