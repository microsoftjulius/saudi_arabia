<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UgandanCompany;
use App\Http\Resources\UgandanCompanyResource;

class UgandanCompanyController extends Controller
{
    private function createUgandanCompany(){
        return UgandanCompany::create($this->validateUgandanCompany());
    }
    protected function validateUgandanCompany(){
        if(empty(request()->company_name)){
            return redirect()->back()->withErrors("Please enter a company name to continue");
        }elseif(empty(request()->license)){
            return redirect()->back()->withErrors("Please enter the license");
        }elseif(empty(request()->location)){
            return redirect()->back()->withErrors("Please enter the location");
        }elseif(empty(request()->contact)){
            return redirect()->back()->withErrors("Please enter your contact");
        }elseif(empty(request()->email)){
            return redirect()->back()->withErrors("Please enter your email");
        }else{
            return $this->createUgandanCompany();
        }    
    }
    protected function getUgandanCompany(){
        return UgandanCompanyResource::collection(UgandanCompany::all());
    }
    protected function changeUgandanCompany($id){
        return UgandanCompany::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeUgandanCompany($id){
        return UgandanCompany::where('id',$id)->delete();
    }
}
