<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    protected $table= 'Complaints';
    protected $fillable=['complaint_type','complaint_details','reported_date','resolved_date','reported_time','complaint_status','evidence','updated_by','created_by'];

}
