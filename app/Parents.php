<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table= 'Parents';
    protected $fillable=['parent_first_name','parent_last_name','parent_other_name','contact','address','updated_by'];
}
