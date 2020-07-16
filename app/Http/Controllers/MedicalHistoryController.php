<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalHistory;
use App\Http\Resources\MedicalHistoryResource;

class MedicalHistoryController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createMedicalHistory(){
        $medical_history = new MedicalHistory;
        $medical_history->premedical_status         = request()->premedical_status;
        $medical_history->premedical_status_date    = request()->premedical_status_date;
        $medical_history->final_medical_test        = request()->final_medical_test;
        $medical_history->predepature_medical_tests = request()->predepature_medical_tests;
        $medical_history->covid19_certificate       = request()->covid19_certificate;
        $medical_history->covid19_certificate_date  = request()->covid19_certificate_date;
        $medical_history->created_by                = $this->authenticated_instance->getAuthenticatedUser();
        $medical_history->save();
    }
    protected function validateMedicalHistory(){
        if(empty(request()->premedical_status)){
            return redirect()->back()->withErrors("Please enter your premedical status");
        }elseif(empty(request()->premedical_status_date)){
            return redirect()->back()->withErrors("Please enter your premedical status date");
        }elseif(empty(request()->final_medical_test)){
            return redirect()->back()->withErrors("Please attach your final medical test");
        }elseif(empty(request()->predepature_medical_tests)){
            return redirect()->back()->withErrors("Please attach your predepature medical tests");
        }elseif(empty(request()->covid19_certificate)){
            return redirect()->back()->withErrors("Please attach your covid19 certificate");
        }elseif(empty(request()->covid19_certificate_date)){
            return redirect()->back()->withErrors("Please enter your covid19 certificate date");
        }else{
            return $this->createMedicalHistory();
        }
    }
    protected function getMedicalHistory(){
        return MedicalHistoryResource::collection(MedicalHistory::all());
    }
    protected function changeMedicalHistory($id){
        return MedicalHistory::find($id)->update(array(
            'premedical_status'         => request()->premedical_status,
            'premedical_status_date'    => request()->premedical_status_date,
            'final_medical_test'        => request()->final_medical_test,
            'predepature_medical_tests' => request()->predepature_medical_tests,
            'covid19_certificate'       => request()->covid19_certificate,
            'covid19_certificate_date'  => request()->covid19_certificate_date,
        ));   
        return redirect()->back()->with('msg', "Your changes were made successfully"); 
    }
    protected function deleteMedicalHistory($id){
        return MedicalHistory::find($id)->delete();
    }
}
