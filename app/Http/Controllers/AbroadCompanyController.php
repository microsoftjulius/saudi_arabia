<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbroadCompany;
use App\Http\Resources\AbroadCompanyResource;

class AbroadCompanyController extends Controller
{
    //creaing an instance of an authenticated user
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }

    private function createAbroadCompany(){
        $abroad_company = new AbroadCompany;
        $abroad_company->company_name = request()->company_name;
        $abroad_company->contract     = request()->contract;
        $abroad_company->location     = request()->location;
        $abroad_company->job_types    = request()->job_types;
        $abroad_company->visa_number  = request()->visa_number;
        $abroad_company->signature    = request()->signature;
        $abroad_company->contract     = request()->contract;
        $abroad_company->visa_date    = request()->visa_date;
        $abroad_company->created_by   = $this->authenticated_instance->getAuthenticatedUser();
        $abroad_company->save();
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
        }elseif(empty(request()->visa_date)){
            return redirect()->back()->withErrors("Please enter a visa date to continue");
        }else{
            return $this->createAbroadCompany();
        }
    }
    protected function getAbroadCompany(){
        return AbroadCompanyResource::collection(AbroadCompany::all());
    }
    protected function changeAbroadCompany($id){
        return AbroadCompany::find($id)->update(array(
            'company_name' => request()->company_name,
            'contract'     => request()->contract,
            'location'     => request()->location,
            'job_types'    => request()->job_types,
            'visa_number'  => request()->visa_number,
            'signature'    => request()->signature,
            'visa_date'    => request()->visa_date
        ));
        return redirect()->back()->with('msg', "Your changes were made successfully");
    }
    protected function removeAbroadCompany($id){
        return AbroadCompany::find($id)->delete();
    }
}
