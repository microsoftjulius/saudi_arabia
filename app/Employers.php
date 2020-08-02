<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    protected $table= 'employers';
    protected $fillable=['employer_id','first_name','last_name','other_name','contact','address','updated_by','photo','created_by'];
}
