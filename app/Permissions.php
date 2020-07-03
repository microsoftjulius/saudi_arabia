<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table= 'Permissions';
    protected $fillable=['permission_id','permission_name','updated_by'];

}
