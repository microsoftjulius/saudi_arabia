<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use App\Http\Resources\PermissionsResource;

class PermissionsController extends Controller
{
    public function createPermissions(){
        return Permissions::create($this->validatePermissions());
    }
    protected function validatePermissions(){
        return request()->validate([
            'permission_id'=>'required',
            'permission_name'=>'required',
            'updated_by'=>'required',
        ]);
    }
    public function getPermissions(){
        return PermissionsResource::collection(Permissions::all());
    }
    public function changePermissions($id){
        return Permissions::where('id',$id)->update(array('permission_id'=>'PM01'));
    }
    public function removePermissions($id){
        return Permissions::where('id',$id)->delete();
    }
}
