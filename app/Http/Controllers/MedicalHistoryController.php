<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalHistory;
use App\Http\Resources\MedicalHistoryResource;

class MedicalHistoryController extends Controller
{
    private function createMedicalHistory(){
        return MedicalHistory::create($this->validateMedicalHistory());
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
        return MedicalHistory::where('id',$id)->update(array('id'=>'2'));
    }
    protected function deleteMedicalHistory($id){
        return MedicalHistory::where('id',$id)->delete();
    }
}
