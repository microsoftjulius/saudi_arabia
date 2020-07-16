<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    
    protected $table= 'Candidates';
    protected $fillable=['candidate_first_name','candidate_last_name','candidate_other_name','date_of_birth','place_of_birth','next_of_kin','occupation','education_level',
    'contact','consent_letter','updated_by','created_by'];
}
