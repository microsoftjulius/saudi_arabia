<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedUserController extends Controller
{
    public function getLoggedInUser(){
        return 1; //auth()->user()->id;
    }

    public function getLoggedInUserName(){
        return "Julius Ssemakula"; //auth()->user()->name
    }
}
