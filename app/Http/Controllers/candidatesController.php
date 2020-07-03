<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates;
use App\Http\Resources\candidatesResource;

class candidatesController extends Controller
{
    public function createCandidates(){
        return candidates::create($this->validateCandidates());
    }
    protected function validateCandidates(){
        return request()->validate([
            'candidate_id'=>'required',
            'employer_id'=>'required',
            'parent_id'=>'required',
            'abroadCompany_id'=>'required',
            'UGCompany_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'other_name'=>'',
            'date_of_birth'=>'required',
            'place_of_birth'=>'required',
            'next_of_kin'=>'required',
            'occupation'=>'required',
            'education_level'=>'required',
            'contact'=>'required',
            'consent_letter'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getCandidates(){
        return candidatesResource::collection(candidates::all());
    }
    public function changeCandidates($id){
        return candidates::where('id',$id)->update(array('candidate_id'=>'CD01'));
    }
    public function removeCandidates($id){
        return candidates::where('id',$id)->delete();
    }
}