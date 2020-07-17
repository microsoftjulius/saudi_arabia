<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->candidate_instance = new candidatesController;
    }
    protected function getMinistries(){

    }

    protected function getEmbassy(){

    }

    protected function getCandidates(){
        $all_candidates = $this->candidate_instance->getCandidates();
        return view('admin.candidates');
    }
}
