<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbroadCompany extends Model
{
    protected $table= 'AbroadCompany';
    protected $fillable=['company_name','contract','location','job_types',
    'visa_number','visa_date','signature','updated_by','created_by'];
}
