<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    protected $table= 'Employers';
    protected $fillable=['employer_first_name','employer_last_name','employer_other_name','contact','address','updated_by'];
}
