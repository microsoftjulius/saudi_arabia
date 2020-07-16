<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employers;
use App\Http\Resources\EmployersResource;

class EmployersController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createEmployers(){
        $employer = new Employers;
        $employer->employer_first_name = request()->employer_first_name;
        $employer->employer_last_name  = request()->employer_last_name;
        $employer->contact             = request()->contact;
        $employer->address             = request()->address;
        $employer->created_by          = $this->authenticated_instance->getAuthenticatedUser();
        $employer->save();
    }
    protected function validateEmployers(){
        if(empty(request()->employer_first_name)){
            return redirect()->back()->withErrors("Please enter your first name");
        }elseif(empty(request()->employer_last_name)){
            return redirect()->back()->withErrors("Please enter your last name");
        }elseif(empty(request()->contact)){
            return redirect()->back()->withErrors("Please enter your contact");
        }elseif(empty(request()->address)){
            return redirect()->back()->withErrors("Please enter your address");
        }else{
            return $this->createEmployers();
        }
    }
    protected function getEmployers(){
        return EmployersResource::collection(Employers::all());
    }
    protected function changeEmployers($id){
        return Employers::find($id)->update(array(
            'employer_first_name' => request()->employer_first_name,
            'employer_last_name'  => request()->employer_last_name,
            'contact'             => request()->contact,
            'address'             => request()->address,
        ));   
        return redirect()->back()->with('msg', "Your changes were made successfully"); 
    }
    protected function removeEmployers($id){
        return Employers::find($id)->delete();
    }
}
