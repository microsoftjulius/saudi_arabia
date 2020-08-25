<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;
use DB;
use App\Http\Resources\ComplaintsResource;

class ComplaintsController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
    }

    protected function getComplaintForm(){
        $complaint_titles = DB::table('contracts')->select('id','clause_title')->get();
        return view('admin.complaint_form',compact('complaint_titles'));
    }

    private function createComplaints(){
        $violated_contract = DB::table('contracts')->where('clause_title',request()->complaint_type)->value('id');

        if(!empty(request()->complaint_proof)){
            $contract = request()->complaint_proof;
            $contract_original_name = $contract->getClientOriginalName();
            $contract->move('complaint_attachments/',$contract_original_name);
        }else{
            $contract_original_name = null;
        }
        $complaint = new Complaints;
        $complaint->contract_id = $violated_contract;
        $complaint->complaint = request()->complaint_description;
        $complaint->evidence = $contract_original_name;
        $complaint->created_by = $this->authenticated_user->getLoggedInUser();
        $complaint->save();
        return redirect()->back()->with('msg', 'Your complaint form has been submitted successfully, incase of feed back, we shall get back to you as soon as possible');
    }

    protected function validateComplaints(){
        if(empty(request()->complaint_type)){
            return redirect()->back()->withInput()->withErrors("Please enter a complaint type to procees");
        }elseif(empty(request()->complaint_description)){
            return redirect()->back()->withInput()->withErrors("Please enter a complaint description to continue");
        }elseif(DB::table('contracts')->where('clause_title',request()->complaint_type)->exists()){
            return $this->createComplaints();
        }else{
            return redirect()->back()->withInput()->withErrors("Please select a complaint type from the listed complaints, for more clarification, put it in the description");
        }
    }

    protected function getComplaints(){
        $all_complaints = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('candidates','candidates.id','complaints.created_by')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('abroad_companies','abroad_companies.id','candidates.company_id')
        ->where('complaints.status','pending')
        ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title','complaints.id','abroad_companies.company_name')
        ->get();
        return view('admin.complaints',compact('all_complaints'));
    }

    protected function getAllSolvedComplaints(){
        $all_solved_complaints = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('candidates','candidates.id','complaints.created_by')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('abroad_companies','abroad_companies.id','candidates.company_id')
        ->where('complaints.status','solved')
        ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title','complaints.id','abroad_companies.company_name')
        ->get();
        return view('admin.solved_complaints',compact('all_solved_complaints'));
    }

    protected function changeComplaints($id){
        return Complaints::where('id',$id)->update(array('id'=>'2'));
    }

    protected function removeComplaints($id){
        return Complaints::where('id',$id)->delete();
    }

    protected function viewComplaint($id){
        $candidates_complaint_complaint = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('candidates','candidates.id','complaints.created_by')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('abroad_companies','abroad_companies.id','candidates.company_id')
        ->where('complaints.id',$id)
        ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title',
        'abroad_companies.company_name','contracts.english_version','contracts.arabic_version',
        'contracts.clause','employers.econtact','employers.address','complaints.created_at')
        ->get();
        return view('admin.complait_description',compact('candidates_complaint_complaint'));
    }

    protected function markComplaintAsSolved($id){
        Complaints::where('id',$id)->update(array(
            'status'=>'solved'
        ));
        return redirect()->back()->with('msg','Complaint has been marked as solved successfully');
    }

    protected function markComplaintAsNotSolved($id){
        Complaints::where('id',$id)->update(array(
            'status'=>'pending'
        ));
        return redirect()->back()->with('msg','Complaint has been marked as Not Solved successfully');
    }
}
