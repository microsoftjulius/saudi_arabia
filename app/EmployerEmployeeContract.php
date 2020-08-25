<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerEmployeeContract extends Model
{
    protected $fillable = ['contract_status','employer_id','employee_id'];
}
