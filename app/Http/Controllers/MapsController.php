<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates;
use App\User;

class MapsController extends Controller
{
    protected function getGeneralMap(){
        return view('admin.general_map');
    }

    protected function getCandidatesCurrentLocation($id){

        // return $data->latitude;
        $candidate_id = Candidates::where('id',$id)->value('candidates_user_id');
        $last_login_id = User::where('id',$candidate_id)->value('last_login_ip');
        if(empty($last_login_id)){
            return redirect()->back()->withErrors("User has never logged into the system");
        }else{
            $data = \Location::get($last_login_id);
            User::where('id',$candidate_id)->update(array(
                'latitude'=>$data->latitude,
                'longitude' => $data->longitude,
                'country_name' => $data->country_name,
                'city_name'  => $data->city_name
            ));
        }
        return $candidate_id;
        return view('admin.candidates_map');
    }
}
