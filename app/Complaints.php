<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    protected $table= 'complaints';
    protected $fillable=['complaint_id','complaint_type','complaint_details','reported_date','resolved_date','reported_time','complaint_status','evidence','updated_by'];

}
