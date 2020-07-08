<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsurancePolicy extends Model
{
    protected $fillable = ['insurance_proof','insurance_policy','created_by','updated_by'];
}
