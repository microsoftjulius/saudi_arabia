<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser($id){
        $company = new User;
        $company->email = request()->email;
        $company->category_id = $id;
        $company->name  = request()->name .' '. request()->last_name .' '. request()->other_name;
        $company->password = Hash::make(request()->password);
        $company->save();
    }
}
