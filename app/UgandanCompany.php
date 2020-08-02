<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UgandanCompany extends Model
{
    protected $table= 'UgandanCompany';
    protected $fillable=['UGCompany_id','company_name','license','location','contact','email','updated_by'];
}
