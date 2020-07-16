<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solutions;
use App\Http\Resources\SolutionsResource;

class SolutionsController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createSolutions(){
        $medical_history = new Solutions;
        $medical_history->solution_name           = request()->solution_name;
        $medical_history->reg_code                = request()->reg_code;
        $medical_history->final_report_print_out  = request()->final_report_print_out;
        $medical_history->created_by              = $this->authenticated_instance->getAuthenticatedUser();
        $medical_history->save();
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
        return Solutions::find($id)->update(array(
            'solution_name'         => request()->solution_name,
            'reg_code'              => request()->reg_code,
            'final_report_print_out'=> request()->final_report_print_out,
        ));
        return redirect()->back()->with('msg', "Your changes were made successfully");
    }
    protected function removeSolutions($id){
        return Solutions::find($id)->delete();
    }
}
