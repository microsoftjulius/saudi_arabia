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
    protected function getParents(){
        return ParentsResource::collection(Parents::all());
    }
    protected function changeParents($id){
        return Parents::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeParents($id){
        return Parents::where('id',$id)->delete();
    }
}
