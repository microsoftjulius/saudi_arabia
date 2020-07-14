<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbroadCompany;
use App\Http\Resources\AbroadCompanyResource;

class AbroadCompanyController extends Controller
{
    private function createAbroadCompany(){
        return AbroadCompany::create($this->validateAbroadCompany());
    }
    protected function validateAbroadCompany(){
        if(empty(request()->company_name)){
            return redirect()->back()->withErrors("Please enter a company name to continue");
        }elseif(empty(request()->contract)){
            return redirect()->back()->withErrors("Please enter the contract");
        }elseif(empty(request()->location)){
            return redirect()->back()->withErrors("Please enter the location");
        }elseif(empty(request()->job_types)){
            return redirect()->back()->withErrors("Please enter the type of job your applying for");
        }elseif(empty(request()->visa_number)){
            return redirect()->back()->withErrors("Please enter the visa_number");
        }elseif(empty(request()->signature)){
            return redirect()->back()->withErrors("Please sign");
        }elseif(empty(request()->contract)){
            return redirect()->back()->withErrors("Please enter the contract");
        }
        else{
            return $this->createAbroadCompany();
        }
    }
    protected function getAbroadCompany(){
        return AbroadCompanyResource::collection(AbroadCompany::all());
    }
    protected function changeAbroadCompany($id){
        return AbroadCompany::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeAbroadCompany($id){
        return AbroadCompany::where('id',$id)->delete();
    }
}
