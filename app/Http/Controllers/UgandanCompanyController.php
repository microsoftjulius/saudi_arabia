<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UgandanCompany;
use App\Http\Resources\UgandanCompanyResource;

class UgandanCompanyController extends Controller
{
    public function createUgandanCompany(){
        return UgandanCompany::create($this->validateUgandanCompany());
    }
    protected function validateUgandanCompany(){
        return request()->validate([
            'company_name'=>'required',
            'license'=>'required',
            'location'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getUgandanCompany(){
        return UgandanCompanyResource::collection(UgandanCompany::all());
    }
    public function changeUgandanCompany($id){
        return UgandanCompany::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeUgandanCompany($id){
        return UgandanCompany::where('id',$id)->delete();
    }
}
