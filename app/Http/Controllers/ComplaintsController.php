<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;
use App\Http\Resources\ComplaintsResource;

class ComplaintsController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createComplaints(){
        $complaints = new Complaints;
        $complaints->complaint_type    = request()->complaint_type;
        $complaints->complaint_details = request()->complaint_details;
        $complaints->reported_date     = request()->reported_date;
        $complaints->resolved_date     = request()->resolved_date;
        $complaints->reported_time     = request()->reported_time;
        $complaints->complaint_status  = request()->complaint_status;
        $complaints->evidence          = request()->evidence;
        $complaints->reported_date     = request()->reported_date;
    }
    protected function validateComplaints(){
        if(empty(request()->complaint_type)){
            return redirect()->back()->withErrors("Please enter the complaint type");
        }elseif(empty(request()->complaint_details)){
            return redirect()->back()->withErrors("Please enter the complaint details");
        }elseif(empty(request()->reported_date)){
            return redirect()->back()->withErrors("Please enter the reported date of the complaint");
        }elseif(empty(request()->resolved_date)){
            return redirect()->back()->withErrors("Please enter when the complaint was resolved");
        }elseif(empty(request()->reported_time)){
            return redirect()->back()->withErrors("Please enter the reported time");
        }elseif(empty(request()->complaint_status)){
            return redirect()->back()->withErrors("Please enter the complaint status");
        }elseif(empty(request()->evidence)){
            return redirect()->back()->withErrors("Please attach your evidence");
        }elseif(empty(request()->reported_date)){
            return redirect()->back()->withErrors("Please enter your reported date");
        }else{
            return $this->createComplaints();
        }
    }
    protected function getComplaints(){
        return ComplaintsResource::collection(Complaints::all());
    }
    protected function changeComplaints($id){
        return Complaints::find($id)->update(array(
                'complaint_type' => request()->complaint_type,
                'complaint_details' => request()->complaint_details,
                'reported_date'     => request()->reported_date,
                'resolved_date'     => request()->resolved_date,
                'reported_time'     => request()->reported_time,
                'complaint_status'  => request()->complaint_status,
                'evidence'          => request()->evidence,
                'reported_date'     => request()->reported_date,
            ));
            return redirect()->back()->with('msg', "Your changes were made successfully");
        }
    protected function removeComplaints($id){
        return Complaints::find($id)->delete();
    }
}
