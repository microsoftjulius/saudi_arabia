<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbroadCompany;
use App\Http\Resources\AbroadCompanyResource;
use App\User;

class AbroadCompanyController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
        $this->user_instance = new UserController;
    }

    private function createAbroadCompany(){
        //creating an account of a new company, 1 stands for company
        $this->user_instance->createUser(1);

        $company_signature = request()->signature;
        $company_signature_original = $company_signature->getClientOriginalName();
        $company_signature->move('company_signatures/',$company_signature_original);

        $abroad_company = new AbroadCompany;
        $abroad_company->company_name = request()->name;
        $abroad_company->contract     = "contract.pdf";
        $abroad_company->location     = request()->location;
        $abroad_company->job_types    = request()->job_types;
        $abroad_company->visa_number  = request()->visa_number;
        $abroad_company->visa_date    = request()->visa_date;
        $abroad_company->signature    = $company_signature_original;
        $abroad_company->created_by   = $this->authenticated_user->getLoggedInUser();
        $abroad_company->save();

        return redirect()->back()->with('msg','A new company has been created successfully');
    }
    protected function validateAbroadCompany(){
        if(empty(request()->name)){
            return redirect()->back()->withInput()->withErrors("Company name is reqiured to continue");
        }elseif(empty(request()->location)){
            return redirect()->back()->withInput()->withErrors("Please Enter the company location to continue");
        }elseif(empty(request()->job_types)){
            return redirect()->back()->withInput()->withErrors("Please Choose atleast one job type offered by this company.");
        }elseif(empty(request()->visa_number)){
            return redirect()->back()->withInput()->withErrors("Please Enter the company visa number to continue");
        }elseif(AbroadCompany::where('visa_number',request()->visa_number)->exists()){
            return redirect()->back()->withInput()->withErrors("Visa number is already registered by another comapany, please use a different one");
        }elseif(empty(request()->visa_date)){
            return redirect()->back()->withInput()->withErrors("Please Enter the visa date to continue");
        }elseif(empty(request()->signature)){
            return redirect()->back()->withInput()->withErrors("Please Attach the company signature to continue");
        }elseif(empty(request()->email)){
            return redirect()->back()->withInput()->withErrors("Please Enter the company Email to continue");
        }elseif(empty(request()->password)){
            return redirect()->back()->withInput()->withErrors("Please Enter the company Password to continue");
        }elseif(empty(request()->password_one)){
            return redirect()->back()->withInput()->withErrors("Please Confirm the company password to continue");
        }elseif(request()->password != request()->password_one){
            return redirect()->back()->withInput()->withErrors("The Two supplied passwords dont match");
        }elseif(User::where('email',request()->email)->exists()){
            return redirect()->back()->withInput()->withErrors("The supplied Email is already used by a company");
        }else{
            return $this->createAbroadCompany();
        }
    }
    public function getAbroadCompany(){
        $all_abroad_companies = AbroadCompany::all();
        return view('admin.abroad_companies',compact('all_abroad_companies'));
    }
    public function updateAbroadCompany($id){
        AbroadCompany::where('id',$id)->update(array('status'=>'active'));
        return redirect()->back()->with('msg','A company has been successfully activated');
    }
    public function removeAbroadCompany($id){
        AbroadCompany::where('id', $id)->update(
            array(
                'status' => 'deleted',
                'updated_by' => $this->authenticated_user->getLoggedInUser()
            )
        );
        return redirect()->back()->with('msg', "A company has been Suspended successfully");
    }
}
