<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationCentres;
use App\Http\Resources\CommunicationCentresResource;

class CommunicationCentresController extends Controller
{
    public function __construct(){
        $this->authenticated_instance = new AuthenticatedController; 
    }
    private function createCommunicationCentres(){
        $communication_centre = new CommunicationCentres;
        $communication_centre->centre_name = request()->centre_name;
        $communication_centre->contact     = request()->contact;
        $communication_centre->location    = request()->location;
        $communication_centre->created_by  = $this->authenticated_instance->getAuthenticatedUser();
        $communication_centre->save();
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
        return CommunicationCentres::find($id)->update(array(
            'centre_name' => request()->centre_name,
            'contact'     => request()->contact,
            'location'    => request()->location,
        ));   
        return redirect()->back()->with('msg', "Your changes were made successfully"); 
    }
    protected function removeCommunicationCentres($id){
        return CommunicationCentres::find($id)->delete();
    }
}
