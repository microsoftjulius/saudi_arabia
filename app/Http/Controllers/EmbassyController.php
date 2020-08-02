<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Embassy;
use App\User as EmbassyUser;

class EmbassyController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
    }

    public function getAllEmbassies(){
        $all_embassies = Embassy::all();
        return $all_embassies;
    }

    protected function validatedEmbassy(){
        if(empty(request()->embassy_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy name to continue");
        }elseif(empty(request()->embassy_location)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy location to continue");
        }elseif(empty(request()->embassy_email)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy email to continue");
        }elseif(empty(request()->embassy_password)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy password to continue");
        }elseif(empty(request()->embassy_cpassword)){
            return redirect()->back()->withInput()->withErrors("Please confirm the embassy password to continue");
        }elseif(request()->embassy_cpassword != request()->embassy_password){
            return redirect()->back()->withInput()->withErrors("make sure the two passwords match");
        }else{
            return $this->createEmbassy();
        }
    }

    private function createEmbassy(){
        //creating a new embassy user
        $this->createEmbassyUser();
        $embassy = new Embassy;
        $embassy->embassy_name = request()->embassy_name;
        $embassy->embassy_location = request()->embassy_location;
        $embassy->created_by   = $this->authenticated_user->getLoggedInUser();
        $embassy->save();
        return redirect()->back()->with('msg','A new embassy has been created successfully');
    }

    private function createEmbassyUser(){
        $new_embassy = new EmbassyUser;
        $new_embassy->name        = request()->embassy_name;
        $new_embassy->email       = request()->embassy_email;
        $new_embassy->category_id = 3; //3 stands for embassy
        $new_embassy->password    = request()->embassy_password;
        $new_embassy->save();
    }
}
