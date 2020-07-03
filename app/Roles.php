<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table= 'Roles';
    protected $fillable=['role_id','role_name','updated_by'];

}
