<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbroadCompany;
use App\Http\Resources\AbroadCompanyResource;

class AbroadCompanyController extends Controller
{
    public function createAbroadCompany(){
        return AbroadCompany::create($this->validateAbroadCompany());
    }
    protected function validateAbroadCompany(){
        return request()->validate([
            'company_name'=>'required',
            'contract'=>'required',
            'location'=>'required',
            'job_types'=>'required',
            'visa_number'=>'required',
            'visa_date'=>'required',
            'signature'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getAbroadCompany(){
        return AbroadCompanyResource::collection(AbroadCompany::all());
    }
    public function changeAbroadCompany($id){
        return AbroadCompany::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeAbroadCompany($id){
        return AbroadCompany::where('id',$id)->delete();
    }
}
