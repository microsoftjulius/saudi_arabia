<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    protected $table= 'employers';
    protected $fillable=['employer_id','efirst_name','elast_name','eother_name','econtact','address','updated_by','photo','created_by'];
}
