<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{
    protected $table= 'Solutions';
    protected $fillable=['solution_name','reg_code','final_report_print_out','updated_by'];

}
