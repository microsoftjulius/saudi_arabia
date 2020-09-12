<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaints;

class BrokenContractsClauseController extends Controller
{
    public function numberOfTimesClauseTwoIsBroken(){
        return Complaints::where('contract_id',1)->count();
    }

    public function numberOfTimesClauseThreeIsBroken(){
        return Complaints::where('contract_id',2)->count();
    }

    public function numberOfTimesClauseFourIsBroken(){
        return Complaints::where('contract_id',3)->count();
    }

    public function numberOfTimesClauseFiveIsBroken(){
        return Complaints::where('contract_id',4)->count();
    }

    public function numberOfTimesClauseSixIsBroken(){
        return Complaints::where('contract_id',5)->count();
    }

    public function numberOfTimesClauseSevenIsBroken(){
        return Complaints::where('contract_id',6)->count();
    }

    public function numberOfTimesClauseEightIsBroken(){
        return Complaints::where('contract_id',7)->count();
    }

    public function numberOfTimesClauseNineIsBroken(){
        return Complaints::where('contract_id',8)->count();
    }

    public function numberOfTimesClauseTenIsBroken(){
        return Complaints::where('contract_id',9)->count();
    }

    public function numberOfTimesClauseElevenIsBroken(){
        return Complaints::where('contract_id',10)->count();
    }

    public function numberOfTimesClauseTwelveIsBroken(){
        return Complaints::where('contract_id',11)->count();
    }

    public function numberOfTimesClauseThirteenIsBroken(){
        return Complaints::where('contract_id',12)->count();
    }

    public function numberOfTimesClauseFourteenIsBroken(){
        return Complaints::where('contract_id',13)->count();
    }

    public function numberOfTimesClauseFifteenIsBroken(){
        return Complaints::where('contract_id',14)->count();
    }

    public function numberOfTimesClauseSixTeenRomanOneIsBroken(){
        return Complaints::where('contract_id',15)->count();
    }

    public function numberOfTimesClauseSixTeenRomanTwoIsBroken(){
        return Complaints::where('contract_id',16)->count();
    }

    public function numberOfTimesClauseSixTeenRomanThreeIsBroken(){
        return Complaints::where('contract_id',17)->count();
    }

    public function numberOfTimesClauseSixTeenRomanFourIsBroken(){
        return Complaints::where('contract_id',18)->count();
    }

    public function numberOfTimesClauseSeventeenAIsBroken(){
        return Complaints::where('contract_id',19)->count();
    }

    public function numberOfTimesClauseSeventeenBIsBroken(){
        return Complaints::where('contract_id',20)->count();
    }

    public function numberOfTimesClauseSeventeenCIsBroken(){
        return Complaints::where('contract_id',21)->count();
    }

    public function numberOfTimesClauseSeventeenDIsBroken(){
        return Complaints::where('contract_id',22)->count();
    }

    public function numberOfTimesClauseSeventeenEIsBroken(){
        return Complaints::where('contract_id',23)->count();
    }

    public function numberOfTimesClauseSeventeenFIsBroken(){
        return Complaints::where('contract_id',24)->count();
    }

    public function numberOfTimesClauseSeventeenGIsBroken(){
        return Complaints::where('contract_id',25)->count();
    }

    public function numberOfTimesClauseSeventeenHIsBroken(){
        return Complaints::where('contract_id',26)->count();
    }

    public function numberOfTimesClauseEighteenIsBroken(){
        return Complaints::where('contract_id',27)->count();
    }

    public function numberOfTimesClauseNinteenIsBroken(){
        return Complaints::where('contract_id',28)->count();
    }

    public function numberOfTimesClauseTwentyIsBroken(){
        return Complaints::where('contract_id',29)->count();
    }
    
    public function numberOfTimesClauseTwentyOneIsBroken(){
        return Complaints::where('contract_id',30)->count();
    }

    public function numberOfTimesClauseTwentyTwoIsBroken(){
        return Complaints::where('contract_id',31)->count();
    }

    public function numberOfTimesClauseTwentyThreeIsBroken(){
        return Complaints::where('contract_id',32)->count();
    }
}
