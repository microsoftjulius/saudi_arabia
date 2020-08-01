<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embassy extends Model
{
    protected $fillable = ['embassy_name','embassy_location','created_by'];
}
