<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates;
use App\Http\Resources\candidatesResource;

class candidatesController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createCandidates($parent_id){
        $candidate= new candidates; 
        $candidate->candidate_first_name = request()->candidate_first_name;
        $candidate->candidate_last_name = request()->candidate_last_name;
        $candidate->date_of_birth       = request()->date_of_birth;
        $candidate->place_of_birth      = request()->place_of_birth;
        $candidate->next_of_kin         = request()->next_of_kin;
        $candidate->occupation          = request()->occupation;
        $candidate->education_level     = request()->education_level;
        $candidate->contact             = request()->contact;
        $candidate->parent_first_name   = request()->parent_first_name;
        $candidate->parent_last_name    = request()->parent_last_name;
        $candidate->parent_contact      = request()->parent_contact;
        $candidate->parent_address      = request()->parent_address;
        $candidate->consent_letter      = request()->consent_letter;
        $candidate->created_by          = $this->authenticated_instance->getAuthenticatedUser();
        $candidate->save();
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
            return redirect()->back()-> withErrors("Please enter your occupation");
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
            return redirect()->back()->withErrors("Please atwhere('id',attach your consent_letter");
        }else{
            return $this->createParents();
        }
    }
    protected function getCandidates(){
        return candidatesResource::collection(candidates::all());
    }
    protected function changeCandidates($id){
        return candidates::find($id)->update(array(
            'candidate_first_name'  =>request()->candidate_first_name,
            'candidate_last_name'   =>request()->candidate_last_name,
            'date_of_birth'         =>request()->date_of_birth,
            'place_of_birth'        =>request()->place_of_birth,
            'next_of_kin'           =>request()->next_of_kin,
            'occupation'            =>request()->occupation,
            'education_level'       =>request()->education_level,
            'contact'               =>request()->contact,
            'parent_first_name'     =>request()->parent_first_name,
            'parent_last_name'      =>request()->parent_last_name,
            'parent_contact'        =>request()->parent_contact,
            'parent_address'        =>request()->parent_address,
            'consent_letter'        =>request()->consent_letter,
        ));
        return redirect()->back()->with('msg', "Your changes were made successfully");
    }
    protected function removeCandidates($id){
        return candidates::find($id)->delete();
    }
}
