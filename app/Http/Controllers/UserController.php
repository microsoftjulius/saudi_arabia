<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->candidate_instance = new candidatesController;
        $this->embassy_instance   = new EmbassyController;
        $this->ministry_instance  = new MinistriesController;
    }
    protected function getMinistries(){
        $all_ministries = $this->ministry_instance->getAllMinistries();
        return view('admin.ministries',compact('all_ministries'));
    }

    protected function getEmbassy(){
        $all_emabssies = $this->embassy_instance->getAllEmbassies();
        return view('admin.embassies',compact('all_emabssies'));
    }

    protected function getCandidates($id){
        $all_candidates = $this->candidate_instance->getCandidates($id);
        return view('admin.candidates',compact('all_candidates'));
    }
}
