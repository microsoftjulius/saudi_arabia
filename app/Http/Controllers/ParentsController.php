<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;
use App\Http\Resources\ParentsResource;

class ParentsController extends Controller
{
    public function createParents(){
        return Parents::create($this->validateParents());
    }
    protected function validateParents(){
        return request()->validate([
            'parent_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'other_name'=>'',
            'contact'=>'required',
            'address'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getParents(){
        return ParentsResource::collection(Parents::all());
    }
    public function changeParents($id){
        return Parents::where('id',$id)->update(array('parent_id'=>'P01'));
    }
    public function removeParents($id){
        return Parents::where('id',$id)->delete();
    }
}
