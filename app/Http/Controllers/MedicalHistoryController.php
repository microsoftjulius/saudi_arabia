<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalHistory;
use App\Http\Resources\MedicalHistoryResource;

class MedicalHistoryController extends Controller
{
    public function createMedicalHistory(){
        return MedicalHistory::create($this->validateMedicalHistory());
    }
    protected function validateMedicalHistory(){
        return request()->validate([
            'candidate_id'=>'required',
            'premedical_status'=>'required',
            'premedical_status_date'=>'required',
            'final_medical_test'=>'required',
            'predepature_medical_tests'=>'required',
            'covid19_certificate'=>'required',
            'covid19_certificate_date'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getMedicalHistory(){
        return MedicalHistoryResource::collection(MedicalHistory::all());
    }
    public function changeMedicalHistory($id){
        return MedicalHistory::where('id',$id)->update(array('id'=>'2'));
    }
    public function deleteMedicalHistory($id){
        return MedicalHistory::where('id',$id)->delete();
    }
}
