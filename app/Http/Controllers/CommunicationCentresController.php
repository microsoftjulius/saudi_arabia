<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationCentres;
use App\Http\Resources\CommunicationCentresResource;

class CommunicationCentresController extends Controller
{
    public function createCommunicationCentres(){
        return CommunicationCentres::create($this->validateCommunicationCentres());
    }
    protected function validateCommunicationCentres(){
        return request()->validate([
            'communicationCentre_id'=>'required',
            'centre_name'=>'required',
            'contact'=>'required',
            'location'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getCommunicationCentres(){
        return CommunicationCentresResource::collection(CommunicationCentres::all());
    }
    public function changeCommunicationCentres($id){
        return CommunicationCentres::where('id',$id)->update(array('communicationCentre_id'=>'CC01'));
    }
    public function removeCommunicationCentres($id){
        return CommunicationCentres::where('id',$id)->delete();
    }
}
