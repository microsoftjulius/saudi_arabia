<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates as Candidates;
use App\Http\Resources\candidatesResource;
use App\User;

class candidatesController extends Controller
{
    public function createCandidates($parent_id, $created_by){

        $candidates_photo = request()->passport_photo;
        $passport_photo_original_name = $candidates_photo->getClientOriginalName();
        $candidates_photo->move('candidates_passport_photos/',$passport_photo_original_name);

        $conset_letter = request()->candidates_conset_letter;
        $candidates_conset_letter_original_name = $conset_letter->getClientOriginalName();
        $conset_letter->move('candidates_conset_letter/',$candidates_conset_letter_original_name);

        $candidates = new Candidates;
        $candidates->first_name                 = request()->first_name;
        $candidates->last_name                  = request()->last_name;
        $candidates->other_name                 = request()->other_name;
        $candidates->duration                   = request()->duration;
        $candidates->date_of_birth              = request()->date_of_birth;
        $candidates->place_of_birth             = request()->place_of_birth;
        $candidates->next_of_kin                = request()->next_of_kin;
        $candidates->contact                    = request()->candidates_contact;
        $candidates->education_level            = request()->candidates_education_level;
        $candidates->occupation                 = request()->candidates_occupation;
        $candidates->consent_letter             = $candidates_conset_letter_original_name;
        $candidates->created_by                 = $created_by;
        $candidates->gender                     = request()->gender;
        $candidates->candidates_user_id         = User::where('email',request()->email)->value('id');
        $candidates->parent_id                  = $parent_id;
        $candidates->passport_photo             = $passport_photo_original_name;
        $candidates->company_id                 = request()->company_id;
        $candidates->save();
        return redirect()->back()->with('msg','New candidate has been created successfully');
    }


    protected function getCandidatesInfo($id){
        $candidates_all_info = Candidates::join('parents','parents.id','candidates.parent_id')
        ->join('users','users.id','candidates.created_by')
        ->join('companies','companies.id','candidates.company_id')
        ->where('candidates.id',$id)
        ->select('companies.company_name','parents.pfirst_name','parents.plast_name','parents.pcontact','parents.paddress',
            'candidates.first_name','candidates.last_name','candidates.other_name','candidates.passport_photo',
            'candidates.duration','candidates.place_of_birth','candidates.date_of_birth','candidates.next_of_kin',
            'candidates.education_level','candidates.occupation','candidates.consent_letter','candidates.status','candidates.contact','candidates.created_at')
        ->get();
        return view('admin.candidates_profile',compact('candidates_all_info'));
    }

    public function getCandidates($id){
        $all_candidates = Candidates::where('company_id',$id)->where('status','!=','deleted')->get();
        return view('admin.candidates',compact('all_candidates'));
    }

    public function changeCandidates($id){
        return Candidates::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeCandidates($id){
        Candidates::where('id',$id)->update(array(
            'status' => 'deleted'
        ));
        return redirect()->back()->with('msg','A candidate has been removed successfully');
    }


}
