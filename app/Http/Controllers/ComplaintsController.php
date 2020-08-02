<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;
use App\Http\Resources\ComplaintsResource;

class ComplaintsController extends Controller
{
    public function createComplaints(){
        return Complaints::create($this->validateComplaints());
    }
    protected function validateComplaints(){
        return request()->validate([
            'complaint_type'=>'required',
            'complaint_details'=>'required',
            'reported_date'=>'required',
            'resolved_date'=>'required',
            'reported_time'=>'required',
            'complaint_status'=>'required',
            'evidence'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getComplaints(){
        return ComplaintsResource::collection(Complaints::all());
    }
    public function changeComplaints($id){
        return Complaints::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeComplaints($id){
        return Complaints::where('id',$id)->delete();
    }
}
