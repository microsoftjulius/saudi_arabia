<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;
use DB;
use App\Http\Resources\ComplaintsResource;
use Carbon\Carbon;

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
        if(auth()->user()->category_id == 1){
            $all_complaints = $this->getCompanyComplaints(auth()->user()->id);
        }else{
            $all_complaints = Complaints::join('contracts','contracts.id','complaints.contract_id')
            ->join('candidates','candidates.id','complaints.created_by')
            ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
            ->join('employers','employers.id','employer_employee_contracts.employer_id')
            ->join('companies','companies.id','complaints.company_id')
            ->where('complaints.status','pending')
            ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
            'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title','complaints.id','companies.company_name')
            ->get();
        }
        return view('admin.complaints',compact('all_complaints'));
    }

    private function getCompanyComplaints($company_id){
        return Complaints::join('candidates','candidates.id','complaints.created_by')
        ->join('companies','companies.id','candidates.company_id')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('contracts','contracts.id','complaints.contract_id')
        ->where('complaints.company_id',$company_id)
        ->where('complaints.status','pending')
        ->get();
    }

    protected function getAllSolvedComplaints(){
        if(auth()->user()->category_id == 1){
            $all_solved_complaints = $this->getSolvedCompanyComplaints(auth()->user()->id);
        }else{
            $all_solved_complaints = Complaints::join('contracts','contracts.id','complaints.contract_id')
                ->join('candidates','candidates.id','complaints.created_by')
                ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
                ->join('employers','employers.id','employer_employee_contracts.employer_id')
                ->join('companies','companies.id','complaints.company_id')
                ->where('complaints.status','solved')
                ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
                'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title','complaints.id','companies.company_name')
                ->get();
        }
        return view('admin.solved_complaints',compact('all_solved_complaints'));
    }

    private function getSolvedCompanyComplaints($company_id){
        return Complaints::join('candidates','candidates.id','complaints.created_by')
        ->join('companies','companies.id','candidates.company_id')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','candidates.id')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('contracts','contracts.id','complaints.contract_id')
        ->where('complaints.company_id',$company_id)
        ->where('complaints.status','solved')
        ->get();
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
        ->join('companies','companies.id','complaints.company_id')
        ->where('complaints.id',$id)
        ->select('employers.efirst_name','employers.elast_name','employers.eother_name','candidates.first_name',
        'candidates.last_name','candidates.other_name','complaints.*','contracts.clause_title',
        'companies.company_name','contracts.english_version','contracts.arabic_version',
        'contracts.clause','employers.econtact','employers.address','complaints.created_at','complaints.id','candidates.candidates_user_id')
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

    protected function getMyComplaints(){
        $my_complaints = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->select('complaints.complaint','complaints.evidence','complaints.status','contracts.clause_title')
        ->get();
        return response()->json($my_complaints);
    }

    protected function getComplaintsForDeployment(){
        $complaints_for_deployment = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','complaints.created_by')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('companies','companies.id','candidates.company_id')
        ->select('complaints.complaint','complaints.evidence','complaints.status','contracts.clause_title','employers.efirst_name',
            'employers.elast_name','employers.eother_name','candidates.first_name','candidates.last_name','candidates.other_name',
            'companies.company_name','complaints.created_at','complaints.id','candidates.candidates_user_id')
        ->get();
        return view('admin.complaints_for_deployment',compact('complaints_for_deployment'));
    }

    protected function getPendingComplaintsForDeployment(){
        $pending_complaints_for_deployment = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','complaints.created_by')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('companies','companies.id','candidates.company_id')
        ->select('complaints.complaint','complaints.evidence','complaints.status','contracts.clause_title','employers.efirst_name',
            'employers.elast_name','employers.eother_name','candidates.first_name','candidates.last_name','candidates.other_name',
            'companies.company_name','complaints.created_at','complaints.id')
            ->where('complaints.status','pending')
        ->get();
        return view('admin.pending_complaints_for_deployment',compact('pending_complaints_for_deployment'));
    }

    protected function getSolvedComplaintsForDeployment(){
        $solved_complaints_for_deployment = Complaints::join('contracts','contracts.id','complaints.contract_id')
        ->join('employer_employee_contracts','employer_employee_contracts.employee_id','complaints.created_by')
        ->join('employers','employers.id','employer_employee_contracts.employer_id')
        ->join('candidates','candidates.id','employer_employee_contracts.employee_id')
        ->join('companies','companies.id','candidates.company_id','candidates.candidates_user_id')
        ->where('complaints.status','solved')
        ->select('complaints.complaint','complaints.evidence','complaints.status','contracts.clause_title','employers.efirst_name',
        'employers.elast_name','employers.eother_name','candidates.first_name','candidates.last_name','candidates.other_name',
        'companies.company_name','complaints.created_at','complaints.id')
        ->get();
        return view('admin.solved_complaints_for_deployment',compact('solved_complaints_for_deployment'));
    }
    
    /**
     * This function counts the number of complaints
     */
    public function countAllComplaints(){
        return Complaints::count();
    }

    /**
     * this function counts the number of pending complaints
     */
    public function countPendingComplaints(){
        return Complaints::where('status','pending')->count();
    }
    /**
     * This function counts the number of solved complaints
     */
    public function countSolvedFunctions(){
        return Complaints::where('status','solved')->count();
    }
    /**
     * This function counts the number of complaints that are pending for over a week
     */
    public function countDelayedComplaints(){
        /**
         * get all complaints,
         * for each complaint, get the dates it was posted
         * if the date difference from now is 7
         * count it
         */

        $complaints_count_array = [];
        $all_complaints = Complaints::where('status','pending')->get();
        foreach($all_complaints as $i => $complaints){
            if(Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now())->diffInDays($complaints->created_at) > 8){
                array_push($complaints_count_array, $i);
            }
        }
        return count($complaints_count_array);
    }
}
