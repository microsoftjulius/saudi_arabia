<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;
use App\Http\Resources\ComplaintsResource;

class ComplaintsController extends Controller
{
    private function createComplaints(){
        return Complaints::create($this->validateComplaints());
    }
    protected function validateComplaints(){
        if(empty(request()->complaint_type)){
            return redirect()->back()->withErrors("Please enter the cmplaint type");
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
        return Complaints::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeComplaints($id){
        return Complaints::where('id',$id)->delete();
    }
}
