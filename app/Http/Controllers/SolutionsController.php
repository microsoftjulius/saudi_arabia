<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solutions;
use App\Http\Resources\SolutionsResource;

class SolutionsController extends Controller
{
    private function createSolutions(){
        return Solutions::create($this->validateSolutions());
    }
    protected function validateSolutions(){
        if(empty(request()->solution_name)){
            return redirect()->back()->withErrors("Please enter the solution to the complaint");
        }elseif(empty(request()->reg_code)){
            return redirect()->back()->withErrors("Please enter your reg code");
        }elseif(empty(request()->final_report_print_out)){
            return redirect()->back()->withErrors("Please attach final report print out");
        }else{
            return $this->createSolutions();
        }
    }
    protected function getSolutions(){
        return SolutionsResource::collection(Solutions::all());
    }
    protected function changeSolutions($id){
        return Solutions::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeSolutions($id){
        return Solutions::where('id',$id)->delete();
    }
}
