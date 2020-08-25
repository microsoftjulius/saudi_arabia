<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table= 'parents';
    protected $fillable=['parent_id','first_name','last_name','other_name','contact','address','updated_by'];
}
