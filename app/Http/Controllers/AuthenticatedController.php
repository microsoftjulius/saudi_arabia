<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function getAuthenticatedUser(){
        return 1; //auth()->user()->id;
    }
}
