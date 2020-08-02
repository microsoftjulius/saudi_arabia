<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalStatus extends Model
{
    protected $fillable = ['disease_suspected','signs_and_symptoms','canditate_id'];
}
