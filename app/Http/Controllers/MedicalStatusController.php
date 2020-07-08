<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalStatus;

class MedicalStatusController extends Controller
{
    public function __construct(){
        $this->authenticated_user_instance = new AuthenticatedUserController;
    }

    private function reportASickness(){
        $medical_status = new MedicalStatus;
        $medical_status->disease_suspected  = request()->disease_suspected;
        $medical_status->signs_and_symptoms = request()->signs_and_symptoms;
        $medical_status->canditate_id       = $this->authenticated_user_instance->getLoggedInUser();
        $medical_status->save();
    }

    /**
     * This function validates the data of a user
     */
    protected function validateReport(){
        if(empty(request()->disease_suspected)){
            return redirect()->back()->withErrors('Please Attach a disease you suspect to be having');
        }elseif(empty(request()->signs_and_symptoms)){
            return redirect()->back()->withErrors('Please describe atlease some symptoms of signs you have');
        }else{
            return $this->reportASickness();
        }
    }
}
