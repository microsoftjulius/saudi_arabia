<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Http\Resources\RolesResource;

class RolesController extends Controller
{
    public function createRoles(){
        return Roles::create($this->validateRoles());
    }
    protected function validateRoles(){
        return request()->validate([
            'role_id'=>'required',
            'role_name'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getRoles(){
        return RolesResource::collection(Roles::all());
    }
    public function changeRoles($id){
        return Roles::where('id',$id)->update(array('role_id'=>'R01'));
    }
    public function removeRoles($id){
        return Roles::where('id',$id)->delete();
    }
}
