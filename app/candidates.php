<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    
    protected $table= 'Candidates';
    protected $fillable=['candidate_id','employer_id','parent_id','abroadCompany_id','UGCompany_id','first_name',
    'last_name','other_name','date_of_birth','place_of_birth','next_of_kin','occupation','education_level',
    'contact','consent_letter','updated_by'];
}
