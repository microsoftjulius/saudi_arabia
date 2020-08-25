<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;
use App\candidates as Candidates;
use App\Http\Resources\ParentsResource;
use App\User;

class ParentsController extends Controller
{
    public function __construct(){
        $this->candidates_instance = new candidatesController;
        $this->authenticated_user  = new AuthenticatedUserController;
        $this->user_instance       = new UserController;
    }
    private function createParents(){
        //creating a candidate user
        //the passed parameter 5 differetiates the candidate from the other users
        $this->user_instance->createUser(5); 
        if(Parents::where('pcontact',request()->pcontact)->exists()){
            $parent_id = Parents::where('pcontact',request()->pcontact)->value('id');
        }else{
            $parent = new Parents;
            $parent->pfirst_name = request()->pfirst_name;
            $parent->plast_name  = request()->plast_name;
            $parent->pother_name = request()->pother_name;
            $parent->pcontact    = request()->pcontact;
            $parent->paddress    = request()->paddress;
            $parent->updated_by  = $this->authenticated_user->getLoggedInUser();
            $parent->save();
            $parent_id = Parents::where('pcontact',request()->pcontact)->value('id');
        }
        return $this->candidates_instance->createCandidates($parent_id, $this->authenticated_user->getLoggedInUser());
    }

    protected function validateCandidates(){
        if(empty(request()->pfirst_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the parents first name to continue");
        }elseif(empty(request()->plast_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the parents last name to continue");
        }elseif(empty(request()->pcontact)){
            return redirect()->back()->withInput()->withErrors("Please enter the parents contact to continue");
        }elseif(empty(request()->paddress)){
            return redirect()->back()->withInput()->withErrors("Please enter the parents address to continue");
        }elseif(empty(request()->first_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates first name to continue");
        }elseif(empty(request()->last_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates last name to continue");
        }elseif(empty(request()->duration)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates duration of work to continue");
        }elseif(empty(request()->date_of_birth)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates date of birth to continue");
        }elseif(empty(request()->place_of_birth)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates place of birth to continue");
        }elseif(empty(request()->next_of_kin)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates next of kin to continue");
        }elseif(empty(request()->candidates_contact)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates contact to continue");
        }elseif(empty(request()->candidates_education_level)){
            return redirect()->back()->withErrors("Please enter the candidates education level to continue");
        }elseif(empty(request()->candidates_occupation)){
            return redirect()->back()->withInput()->withErrors("Please enter the candidates occupation to continue");
        }elseif(empty(request()->candidates_conset_letter)){
            return redirect()->back()->withInput()->withErrors("Please enter a conset letter continue");
        }elseif(empty(request()->email)){
            return redirect()->back()->withInput()->withErrors("Please enter the ministry email to continue");
        }elseif(empty(request()->password)){
            return redirect()->back()->withInput()->withErrors("Please enter the ministry password to continue");
        }elseif(request()->password != request()->password_confirm){
            return redirect()->back()->withInput()->withErrors("Please enter make sure the two passwords match to continue");
        }elseif(User::where('email',request()->email)->exists()){
            return redirect()->back()->withInput()->withErrors("The supplies email has already been used");
        }elseif(Candidates::where('contact',request()->candidates_contact)->exists()){
            return redirect()->back()->withInput()->withErrors("The candidates contact entered is already used by another candidate, please enter a new contact to continue");
        }else{
            return $this->createParents();
        }
    }

    public function getParents(){
        return ParentsResource::collection(Parents::all());
    }
    public function changeParents($id){
        return Parents::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeParents($id){
        return Parents::where('id',$id)->delete();
    }
}
