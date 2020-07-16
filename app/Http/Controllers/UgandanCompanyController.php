<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UgandanCompany;
use App\Http\Resources\UgandanCompanyResource;

class UgandanCompanyController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createUgandanCompany(){
        $ugandan_company = new UgandanCompany;
        $ugandan_company->company_name = request()->company_name;
        $ugandan_company->license      = request()->license;
        $ugandan_company->location     = request()->location;
        $ugandan_company->contact      = request()->contact;
        $ugandan_company->email        = request()->email;
        $abroad_company->created_by    = $this->authenticated_instance->getAuthenticatedUser();
        $ugandan_company->save();
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
        return UgandanCompany::find($id)->update(array(
            'company_name'  => request()->company_name,
            'license'       => request()->license,
            'location'      => request()->location,
            'contact'       => request()->contact,
            'email'         => request()->email,
        ));   
        return redirect()->back()->with('msg', "Your changes were made successfully"); 
    }
    protected function removeUgandanCompany($id){
        return UgandanCompany::find($id)->delete();
    }
}
