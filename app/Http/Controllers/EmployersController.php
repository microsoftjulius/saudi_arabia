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
            'first_name'=>'required',
            'last_name'=>'required',
            'other_name'=>'',
            'contact'=>'required',
            'address'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getEmployers(){
        $all_employers = Employers::all();
        return view('admin.employers');
    }
    public function changeEmployers($id){
        return Employers::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeEmployers($id){
        return Employers::where('id',$id)->delete();
    }
}
