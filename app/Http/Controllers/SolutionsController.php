<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solutions;
use App\Http\Resources\SolutionsResource;

class SolutionsController extends Controller
{
    public function createSolutions(){
        return Solutions::create($this->validateSolutions());
    }
    protected function validateSolutions(){
        return request()->validate([
            'solution_name'=>'required',
            'reg_code'=>'required',
            'final_report_print_out'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getSolutions(){
        return SolutionsResource::collection(Solutions::all());
    }
    public function changeSolutions($id){
        return Solutions::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeSolutions($id){
        return Solutions::where('id',$id)->delete();
    }
}
