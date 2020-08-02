<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates as Candidates;
use App\Http\Resources\candidatesResource;

class candidatesController extends Controller
{
    public function createCandidates(){
        return Candidates::create($this->validateCandidates());
    }
    protected function validateCandidates(){
        return request()->validate([
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

    protected function getCandidatesInfo($id){
        $candidates_all_info = Candidates::join('parents','parents.id','candidates.parent_id')
        ->join('users','users.id','candidates.user_id')
        ->where('candidates.id',$id)
        ->select('users.name','parents.pfirst_name','parents.plast_name','parents.pcontact','parents.paddress',
            'candidates.first_name','candidates.last_name','candidates.other_name','candidates.passport_photo',
            'candidates.duration','candidates.place_of_birth','candidates.date_of_birth','candidates.next_of_kin',
            'candidates.education_level','candidates.occupation','candidates.consent_letter','candidates.status','candidates.contact','candidates.created_at')
        ->get();
        //return $candidates_all_info;
        return view('admin.candidates_profile',compact('candidates_all_info'));
    }

    public function getCandidates($id){
        $all_candidates = Candidates::where('company_id',$id)->get();
        return $all_candidates;
    }

    public function changeCandidates($id){
        return Candidates::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeCandidates($id){
        return Candidates::where('id',$id)->delete();
    }


}
