<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationCentres;
use App\Http\Resources\CommunicationCentresResource;

class CommunicationCentresController extends Controller
{
    private function createCommunicationCentres(){
        return CommunicationCentres::create($this->validateCommunicationCentres());
    }
    protected function validateCommunicationCentres(){
        if(empty(request()->centre_name)){
            return redirect()->back()->withErrors("Please enter your centre_name");
        }elseif(empty(request()->contact)){
            return redirect()->back()->withErrors("Please enter your contact");
        }elseif(empty(request()->location)){
            return redirect()->back()->withErrors("Please enter your location");
        }else{
            return $this->createCommunicationCentres();
        }
    }
    protected function getCommunicationCentres(){
        return CommunicationCentresResource::collection(CommunicationCentres::all());
    }
    protected function changeCommunicationCentres($id){
        return CommunicationCentres::where('id',$id)->update(array('id'=>'2'));
    }
    protected function removeCommunicationCentres($id){
        return CommunicationCentres::where('id',$id)->delete();
    }
}
