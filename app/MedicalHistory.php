<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $table= 'medical_histories';
    protected $fillable=['medic_id','candidate_id','premedical_status','premedical_status_date','final_medical_test',
    'predepature_medical_tests','covid19_certificate','covid19_certificate_date','updated_by'];
}
