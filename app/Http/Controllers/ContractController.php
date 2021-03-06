<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployerEmployeeContract;
use App\candidates as Candidates;
use App\Employers;

class ContractController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
    }

    protected function getExpiredContracts(){
        $expired_contracts = EmployerEmployeeContract::join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')->where('contract_status','finished')
        ->select('employer_employee_contracts.*','employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name')
        ->get();
        return view('admin.expired_contracts',compact('expired_contracts'));
    }

    protected function getTerminatedContracts(){
        $terminated_contracts = EmployerEmployeeContract::join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')->where('contract_status','terminated')
        ->select('employer_employee_contracts.*','employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name')
        ->get();
        return view('admin.terminated_contracts',compact('terminated_contracts'));
    }

    protected function getOnGoingContracts(){
        $ongoing_contracts = EmployerEmployeeContract::join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')->where('contract_status','active')
        ->select('employer_employee_contracts.*','employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name')
        ->get();
        return view('admin.contracts',compact('ongoing_contracts'));
    }

    protected function terminateContract($id){
        EmployerEmployeeContract::where('id',$id)->update(array(
            'contract_status' => 'terminated',
            'updated_by' => $this->authenticated_user->getLoggedInUser()
        )); 
        return redirect()->back()->with('msg','You Successfully terminated a contract between the employer and an employee');
    }

    protected function activateContract($id){
        $employer_id = EmployerEmployeeContract::join('employers','employers.id','employer_employee_contracts.employer_id')
        ->where('employer_employee_contracts.id',$id)
        ->select('employers.id')
        ->get();
        foreach($employer_id as $employer){
            if(Employers::where('id',$employer->id)->where('status','deleted')->exists()){
                return redirect()->back()->withErrors("The employer was deleted, to activate this contract, the employer needs the be activated");
            }
        }
        EmployerEmployeeContract::where('id',$id)->update(array(
            'contract_status' => 'active',
            'updated_by' => $this->authenticated_user->getLoggedInUser()
        )); 
        return redirect()->back()->with('msg','You Successfully activated a contract that was terminated');
    }

    protected function finishContract($id){
        $employer_id = EmployerEmployeeContract::join('employers','employers.id','employer_employee_contracts.employer_id')
        ->where('employer_employee_contracts.id',$id)
        ->select('employers.id')
        ->get();
        foreach($employer_id as $employer){
            if(Employers::where('id',$employer->id)->where('status','deleted')->exists()){
                return redirect()->back()->withErrors("The employer was deleted, to activate this contract, the employer needs the be activated");
            }
        }
        EmployerEmployeeContract::where('id',$id)->update(array(
            'contract_status' => 'active',
            'updated_by' => $this->authenticated_user->getLoggedInUser()
        )); 
        return redirect()->back()->with('msg','You have successfully activated a contract that was marked as finished');
    }

    protected function createNewContract(){
        $available_employees =Candidates::where('status','pending')->get();
        return view('admin.available_employees',compact('available_employees'));
    }

    protected function assignEmployerToEmployee($id){
        $employee_to_be_given_employer = Candidates::where('id',$id)->select('first_name','last_name','other_name')->get();

        $all_employers = Employers::get();
        return view('admin.employers',compact('all_employers','employee_to_be_given_employer'));
    }

    protected function validateContract(){
        if(empty(request()->contract_file)){
            return redirect()->back()->withErrors("Please attach a contract file as proof that a contract has been signed been the employee and employeer");
        }elseif(EmployerEmployeeContract::where('employee_id',request()->employee_id)->exists()){
            return redirect()->back()->withErrors("This Employee was already assigned to an Employer hence can't be assigned to a new employer");
        }else{
            return $this->createContractBetweenEmployerAndEmployee();
        }
    }

    private function createContractBetweenEmployerAndEmployee(){
        $contract_file = request()->contract_file;
        $contract_file_original_name = $contract_file->getClientOriginalName();
        $contract_file->move('contract/',$contract_file_original_name);

        Candidates::where('id',request()->employee_id)->update(array('status' => 'approved'));

        $new_contract = new EmployerEmployeeContract;
        $new_contract->employer_id   = request()->employer_id;
        $new_contract->employee_id   = request()->employee_id;
        $new_contract->contract_file = $contract_file;
        $new_contract->created_by    = $this->authenticated_user->getLoggedInUser();
        $new_contract->save();

        return redirect()->back()->with('msg','A contract has been created between '. request()->employer_name .' and '. request()->employee_name);
    }

}
