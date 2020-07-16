<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;
use App\Http\Resources\ParentsResource;

class ParentsController extends Controller
{
    public function createParents(){
        
    }
    protected function getParents(){
        return ParentsResource::collection(Parents::all());
    }
    protected function changeParents($id){
        return Parents::find($id)->update(array('id'=>'2'));
    }
    protected function removeParents($id){
        return Parents::find($id)->delete();
    }
}
