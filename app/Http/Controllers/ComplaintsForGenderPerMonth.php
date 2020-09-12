<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;

class ComplaintsForGenderPerMonth extends Controller
{
    public function getComplaintsForMalesInJanuary(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','01')->count();
    }

    public function getComplaintsForFemalesInJanuary(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','01')->count();
    }

    public function getComplaintsForMalesInFebruary(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','02')->count();
    }

    public function getComplaintsForFemalesInFebruary(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','02')->count();
    }

    public function getComplaintsForMalesInMarch(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','03')->count();
    }

    public function getComplaintsForFemalesInMarch(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','03')->count();
    }

    public function getComplaintsForMalesInApril(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','04')->count();
    }

    public function getComplaintsForFemalesInApril(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','04')->count();
    }

    public function getComplaintsForMalesInMay(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','05')->count();
    }

    public function getComplaintsForFemalesInMay(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','05')->count();
    }

    public function getComplaintsForMalesInJune(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','06')->count();
    }

    public function getComplaintsForFemalesInJune(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','06')->count();
    }

    public function getComplaintsForMalesInJuly(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','07')->count();
    }

    public function getComplaintsForFemalesInJuly(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','07')->count();
    }

    public function getComplaintsForMalesInAugust(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','08')->count();
    }

    public function getComplaintsForFemalesInAugust(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','08')->count();
    }

    public function getComplaintsForMalesInSeptember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','09')->count();
    }

    public function getComplaintsForFemalesInSeptember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','09')->count();
    }

    public function getComplaintsForMalesInOctober(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','10')->count();
    }

    public function getComplaintsForFemalesInOctober(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','10')->count();
    }

    public function getComplaintsForMalesInNovember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','11')->count();
    }

    public function getComplaintsForFemalesInNovember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','11')->count();
    }

    public function getComplaintsForMalesInDecember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Male')->whereMonth('complaints.created_at','12')->count();
    }

    public function getComplaintsForFemalesInDecember(){
        return Complaints::join('candidates','candidates.candidates_user_id','complaints.created_by')
        ->where('candidates.gender','Female')->whereMonth('complaints.created_at','12')->count();
    }
}
