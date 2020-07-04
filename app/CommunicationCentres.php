<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationCentres extends Model
{
    protected $table= 'CommunicationCentres';
    protected $fillable=['communicationCentre_id','centre_name','location','contact','updated_by'];

}
