<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employers;
use App\Http\Resources\EmployersResource;

class EmployersController extends Controller
{
    public function createEmployers(){
        return Employers::create($this->validateEmployers());
    }
    protected function validateEmployers(){
        return request()->validate([
            'employer_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'other_name'=>'',
            'contact'=>'required',
            'address'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getEmployers(){
        return EmployersResource::collection(Employers::all());
    }
    public function changeEmployers($id){
        return Employers::where('id',$id)->update(array('employer_id'=>'E01'));
    }
    public function removeEmployers($id){
        return Employers::where('id',$id)->delete();
    }
}
