<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbroadCompany extends Model
{
    protected $table= 'abroad_companies';
    protected $fillable=['abroadCompany_id','company_name','contract','location','job_types',
    'visa_number','visa_date','signature','updated_by'];
}
