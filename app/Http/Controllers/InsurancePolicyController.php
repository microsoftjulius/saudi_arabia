<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsurancePolicy;

class InsurancePolicyController extends Controller
{
    public function __construct(){
        $this->authenticated_user_instance = new AuthenticatedUserController;
    }

    private function createAnInsurancePolicy(){
        $insurance_policy = new InsurancePolicy;
        $insurance_policy->insurance_policy = request()->insurance_policy;
        $insurance_policy->created_by       = $this->authenticated_user_instance->getLoggedInUser();
        $insurance_policy->updated_by       = $this->authenticated_user_instance->getLoggedInUser();
        $insurance_policy->insurance_proof  = request()->insurance_proof;
        $insurance_policy->save();
    }

    /**
     * This function validates the insurance policy
     */
    protected function validateInsurancePolicy(){
        if(empty(request()->insurance_policy)){
            return redirect()->back()->withErrors('Please enter an insurance policy to continue');
        }elseif(empty(request()->insurance_proof)){
            return redirect()->back()->withErrors('Please Attach an insurance policy proof to continue');
        }else{
            return $this->createAnInsurancePolicy();
        }
    }
}
