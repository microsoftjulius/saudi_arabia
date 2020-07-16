<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates;
use App\Http\Resources\candidatesResource;

class candidatesController extends Controller
{
    private function createCandidates($parent_id){
        return candidates::create($this->validateCandidates());
    }
    protected function validateCandidates(){
        if(empty(request()->candidate_first_name)){
            return redirect()->back()->withErrors("Please enter your first name");
        }elseif(empty(request()->candidate_last_name)){
            return redirect()->back()->withErrors("Please enter your last name");
        }elseif(empty(request()->date_of_birth)){
            return redirect()->back()->withErrors("Please enter your date of birth");
        }elseif(empty(request()->place_of_birth)){
            return redirect()->back()->withErrors("Please enter your place of birth");
        }elseif(empty(request()->next_of_kin)){
            return redirect()->back()->withErrors("Please enter your next of kin");
        }elseif(empty(request()->occupation)){
            return redirect()->back()->withErrors("Please enter your occupation");
        }elseif(empty(request()->education_level)){
            return redirect()->back()->withErrors("Please attach your education forms");
        }elseif(empty(request()->contact)){
            return redirect()->back()->withErrors("Please enter contact");
        }elseif(empty(request()->parent_first_name)){
            return redirect()->back()->withErrors("Please enter your parent's first name");
        }elseif(empty(request()->parent_last_name)){
            return redirect()->back()->withErrors("Please enter your parent's last name ");
        }elseif(empty(request()->parent_contact)){
            return redirect()->back()->withErrors("Please enter your parent's contact");
        }elseif(empty(request()->parent_address)){
            return redirect()->back()->withErrors("Please enter your parent's address");
        }elseif(empty(request()->consent_letter)){
            return redirect()->back()->withErrors("Please attach your consent_letter");
        }else{
            return $this->createParents();
        }
    }
    protected function getCandidates(){
        return candidatesResource::collection(candidates::all());
    }
    protected function changeCandidates($id){
        return candidates::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeCandidates($id){
        return candidates::where('id',$id)->delete();
    }
}
