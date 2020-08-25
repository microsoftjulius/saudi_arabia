<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployerEmployeeContract;
use App\Employers;
use App\Candidates;

class EmployerEmployeeController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
    }

    private function assignEmployeeToEmployer(){
        $employer = Employers::where('id', request()->employer_id)->value('efirst_name');
        $employee = Candidates::where('id', request()->employee_id)->value('first_name');
        $employer_employee_contract = new EmployerEmployeeContract;
        $employer_employee_contract->employer_id = $employer_id;
        $employer_employee_contract->employee_id = $employee_id;
        $employer_employee_contract->created_by  = $this->authenticated_user->getLoggedInUser();
        $employer_employee_contract->save();
        return redirect()->back()->with('msg','A contract has been signed between the employer ' . $employer . ' and the Domestic worker ' . $employee . ' With '. $this->authenticated_user->getLoggedInUserName() . ' as the witness');
    }

    protected function validateEmployerEmployeeContract(){
        if(empty(request()->employer_id)){
            return redirect()->back()->withErrors("Please select an employer to assign to the Domestic Worker");
        }elseif(empty(request()->employee_id)){
            return redirect()->back()->withErrors("Please select a Domestic Worker to assign to the employer");
        }elseif(EmployerEmployeeContract::where('employee_id',Candidates::where('name', request()->employee)->value('id'))
        ->where('status','active')->exists()){
            return redirect()->back()->withInput()->withErrors("This Domestic worker already has a running contract and can't be assigned a new contract");
        }else{
            return $this->assignEmployeeToEmployer();
        }
    }
}
