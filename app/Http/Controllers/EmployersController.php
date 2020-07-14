<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employers;
use App\Http\Resources\EmployersResource;

class EmployersController extends Controller
{
    private function createEmployers(){
        return Employers::create($this->validateEmployers());
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
        return Employers::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeEmployers($id){
        return Employers::where('id',$id)->delete();
    }
}
