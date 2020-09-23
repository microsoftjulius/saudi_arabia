<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaints;
use App\candidates as Candidates;
use App\AbroadCompany as Companies;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->complaints_per_gender_per_month = new ComplaintsForGenderPerMonth;
        $this->broken_contracts_instance = new BrokenContractsClauseController;
        $this->complaints_instance = new ComplaintsController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_of_clause_two_broken     = $this->broken_contracts_instance->numberOfTimesClauseTwoIsBroken();
        $count_of_clause_three_broken   = $this->broken_contracts_instance->numberOfTimesClauseThreeIsBroken();
        $count_of_clause_four_broken    = $this->broken_contracts_instance->numberOfTimesClauseFourIsBroken();
        $count_of_clause_five_broken    = $this->broken_contracts_instance->numberOfTimesClauseFiveIsBroken();
        $count_of_clause_six_broken     = $this->broken_contracts_instance->numberOfTimesClauseSixIsBroken();
        $count_of_clause_seven_broken   = $this->broken_contracts_instance->numberOfTimesClauseSevenIsBroken();
        $count_of_clause_eight_broken   = $this->broken_contracts_instance->numberOfTimesClauseEightIsBroken();
        $count_of_clause_nine_broken    = $this->broken_contracts_instance->numberOfTimesClauseNineIsBroken();
        $count_of_clause_ten_broken     = $this->broken_contracts_instance->numberOfTimesClauseTenIsBroken();
        $count_of_clause_eleven_broken  = $this->broken_contracts_instance->numberOfTimesClauseElevenIsBroken();
        $count_of_clause_twelve_broken  = $this->broken_contracts_instance->numberOfTimesClauseTwelveIsBroken();
        $count_of_clause_thirteen_broken = $this->broken_contracts_instance->numberOfTimesClauseThirteenIsBroken();
        $count_of_clause_fourteen_broken = $this->broken_contracts_instance->numberOfTimesClauseFourteenIsBroken();
        $count_of_clause_fifteen_broken  = $this->broken_contracts_instance->numberOfTimesClauseFifteenIsBroken();
        $count_of_clause_sixteen_one_broken   = $this->broken_contracts_instance->numberOfTimesClauseSixTeenRomanOneIsBroken();
        $count_of_clause_sixteen_two_broken   = $this->broken_contracts_instance->numberOfTimesClauseSixTeenRomanTwoIsBroken();
        $count_of_clause_sixteen_three_broken = $this->broken_contracts_instance->numberOfTimesClauseSixTeenRomanThreeIsBroken();
        $count_of_clause_sixteen_four_broken  = $this->broken_contracts_instance->numberOfTimesClauseSixTeenRomanFourIsBroken();
        $count_of_clause_seventeen_a_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenAIsBroken();
        $count_of_clause_seventeen_b_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenBIsBroken();
        $count_of_clause_seventeen_c_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenCIsBroken();
        $count_of_clause_seventeen_d_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenDIsBroken();
        $count_of_clause_seventeen_e_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenEIsBroken();
        $count_of_clause_seventeen_f_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenFIsBroken();
        $count_of_clause_seventeen_g_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenGIsBroken();
        $count_of_clause_seventeen_h_broken   = $this->broken_contracts_instance->numberOfTimesClauseSeventeenHIsBroken();
        $count_of_clause_eighteen_broken      = $this->broken_contracts_instance->numberOfTimesClauseEighteenIsBroken();
        $count_of_clause_nineteen_broken      = $this->broken_contracts_instance->numberOfTimesClauseNinteenIsBroken();
        $count_of_clause_twenty_broken        = $this->broken_contracts_instance->numberOfTimesClauseTwentyIsBroken();
        $count_of_clause_twenty_one_broken    = $this->broken_contracts_instance->numberOfTimesClauseTwentyOneIsBroken();
        $count_of_clause_twenty_two_broken    = $this->broken_contracts_instance->numberOfTimesClauseTwentyTwoIsBroken();
        $count_of_clause_twenty_three_broken  = $this->broken_contracts_instance->numberOfTimesClauseTwentyThreeIsBroken();

        $male_complaints_in_january     = $this->complaints_per_gender_per_month->getComplaintsForMalesInJanuary();
        $female_complaints_in_january   = $this->complaints_per_gender_per_month->getComplaintsForFemalesInJanuary();
        $male_complaints_in_february    = $this->complaints_per_gender_per_month->getComplaintsForMalesInFebruary();
        $female_complaints_in_february  = $this->complaints_per_gender_per_month->getComplaintsForFemalesInFebruary();
        $male_complaints_in_march       = $this->complaints_per_gender_per_month->getComplaintsForMalesInMarch();
        $female_complaints_in_march     = $this->complaints_per_gender_per_month->getComplaintsForFemalesInMarch();
        $male_complaints_in_april       = $this->complaints_per_gender_per_month->getComplaintsForMalesInApril();
        $female_complaints_in_april     = $this->complaints_per_gender_per_month->getComplaintsForFemalesInApril();
        $male_complaints_in_may         = $this->complaints_per_gender_per_month->getComplaintsForMalesInMay();
        $female_complaints_in_may       = $this->complaints_per_gender_per_month->getComplaintsForFemalesInMay();
        $male_complaints_in_june        = $this->complaints_per_gender_per_month->getComplaintsForMalesInJune();
        $female_complaints_in_june      = $this->complaints_per_gender_per_month->getComplaintsForFemalesInJune();
        $male_complaints_in_july        = $this->complaints_per_gender_per_month->getComplaintsForMalesInJuly();
        $female_complaints_in_july      = $this->complaints_per_gender_per_month->getComplaintsForFemalesInJuly();
        $male_complaints_in_august      = $this->complaints_per_gender_per_month->getComplaintsForMalesInAugust();
        $female_complaints_in_august    = $this->complaints_per_gender_per_month->getComplaintsForFemalesInAugust();
        $male_complaints_in_september   = $this->complaints_per_gender_per_month->getComplaintsForMalesInSeptember();
        $female_complaints_in_september = $this->complaints_per_gender_per_month->getComplaintsForFemalesInSeptember();
        $male_complaints_in_october     = $this->complaints_per_gender_per_month->getComplaintsForMalesInOctober();
        $female_complaints_in_october   = $this->complaints_per_gender_per_month->getComplaintsForFemalesInOctober();
        $male_complaints_in_november    = $this->complaints_per_gender_per_month->getComplaintsForMalesInNovember();
        $female_complaints_in_november  = $this->complaints_per_gender_per_month->getComplaintsForFemalesInNovember();
        $male_complaints_in_december    = $this->complaints_per_gender_per_month->getComplaintsForMalesInDecember();
        $female_complaints_in_december  = $this->complaints_per_gender_per_month->getComplaintsForFemalesInDecember();
        $comments_by_most_complainer    = $this->getNumberOfComplaintsByMostComplainingPerson();
        $comments_by_least_complainer   = $this->getTheNumberOfComplaintsByTheLeastComplainingPerson();
        $contract_clauses               = $this->getClauses();
        $most_complaining_person        = $this->getMostComplainingPerson()[0]->first_name . " ". $this->getMostComplainingPerson()[0]->last_name;
        $least_complaining_person       =  $this->getLeastComplainingPerson()[0]->first_name . " ". $this->getLeastComplainingPerson()[0]->last_name;
        $number_of_complaints_made_by_rather_not_say = $this->getNumberOfComplaintsMadeByRatherNotSay();
        $number_of_complaints_made_by_females        = $this->getNumberOfComplaintsMadeByFemales();
        $number_of_complaints_made_by_males          = $this->getNumberOfComplaintsMadeByMales();
        $number_of_rather_not_say_registered         = $this->getNumberOfOtherGenderRegistered();
        $number_of_females_registered                = $this->getNumberOfGirlsRegistered();
        $number_of_males_registered                  = $this->getNumberOfBoysRegistered();
        $number_of_complaints_for_company_with_most_complaints  = $this->getNumberOfComplaintsWithCompanyWithMostComplaints();
        $number_of_complaints_for_company_with_least_complaints = $this->getNumberOfComplaintsWithCompanyWithLeastComplaints();
        $company_with_least_complaines                          = $this->getCompanyWithLeastComplaints();
        $company_with_most_complaints                           = $this->getCompanyWithMostComplaints();
        $number_of_employers  = $this->countEmployers();
        $number_of_employees  = $this->countEmployees();
        $number_of_complaints = $this->complaints_instance->countAllComplaints();
        $number_of_user       = $this->countAllUsers();
        $count_delayed_complaints = $this->complaints_instance->countDelayedComplaints();
        $count_solved_complaints = $this->complaints_instance->countSolvedFunctions();
        $count_pending_complaints = $this->complaints_instance->countPendingComplaints();
        $count_complaints = $this->complaints_instance->countAllComplaints();
        return view('welcome', compact('number_of_employees','number_of_employers','number_of_complaints'
        ,'number_of_user','company_with_most_complaints','company_with_least_complaines',
        'number_of_complaints_for_company_with_most_complaints','number_of_complaints_for_company_with_least_complaints',
        'number_of_males_registered','number_of_females_registered',
        'number_of_rather_not_say_registered','number_of_complaints_made_by_males','number_of_complaints_made_by_females',
        'number_of_complaints_made_by_rather_not_say','contract_clauses','most_complaining_person','least_complaining_person',
        'comments_by_most_complainer','comments_by_least_complainer','male_complaints_in_january','female_complaints_in_january',
        'male_complaints_in_february','female_complaints_in_february','male_complaints_in_march','female_complaints_in_march',
        'male_complaints_in_april','female_complaints_in_april','male_complaints_in_may','female_complaints_in_may',
        'male_complaints_in_june','female_complaints_in_june','male_complaints_in_july','female_complaints_in_july',
        'male_complaints_in_august','female_complaints_in_august','male_complaints_in_september','female_complaints_in_september',
        'male_complaints_in_october','female_complaints_in_october','male_complaints_in_november','female_complaints_in_november',
        'male_complaints_in_december','female_complaints_in_december','count_of_clause_two_broken','count_of_clause_three_broken',
        'count_of_clause_four_broken','count_of_clause_five_broken','count_of_clause_six_broken','count_of_clause_seven_broken','count_of_clause_eight_broken',
        'count_of_clause_nine_broken','count_of_clause_ten_broken','count_of_clause_eleven_broken','count_of_clause_twelve_broken',
        'count_of_clause_thirteen_broken','count_of_clause_fourteen_broken','count_of_clause_fifteen_broken','count_of_clause_sixteen_one_broken',
        'count_of_clause_sixteen_two_broken','count_of_clause_sixteen_three_broken','count_of_clause_sixteen_four_broken',
        'count_of_clause_seventeen_a_broken','count_of_clause_seventeen_b_broken','count_of_clause_seventeen_c_broken','count_of_clause_seventeen_d_broken',
        'count_of_clause_seventeen_e_broken','count_of_clause_seventeen_f_broken','count_of_clause_seventeen_g_broken','count_of_clause_seventeen_h_broken',
        'count_of_clause_eighteen_broken','count_of_clause_nineteen_broken',
        'count_of_clause_twenty_broken','count_of_clause_twenty_one_broken','count_of_clause_twenty_two_broken','count_of_clause_twenty_three_broken',
        'count_delayed_complaints','count_solved_complaints','count_pending_complaints','count_complaints'));
    }

    private function countEmployers(){
        return User::where('category_id',2)->count();
    }

    private function countEmployees(){
        return User::where('category_id',5)->count();
    }

    private function countAllUsers(){
        return User::count();
    }

    private function getCompanyWithMostComplaints(){
        //get the candidates that have complained, get the companies to which these candidates belong
        $companies_array = [];
        //get the company that has many candidates that have complained
        $complaints = Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->groupBy('complaints.created_by')
        ->get();
        foreach($complaints as $candidates_company){
            array_push($companies_array, $candidates_company->company_id);
        }
        $counts = array_count_values($companies_array);
        arsort($counts);
        $top_with_count = array_slice($counts, 0, 5, true);

        $top = array_keys($top_with_count);
        $most_appearing_company = $top[0];
        $company_name = Companies::where('id',$most_appearing_company)->get();
        foreach($company_name as $company){
            return $company->company_name;
        }
    }

    private function getCompanyWithLeastComplaints(){
        //get the candidates that have complained, get the companies to which these candidates belong
        $companies_array = [];
        //get the company that has many candidates that have complained
        $complaints = Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->groupBy('complaints.created_by')
        ->get();
        foreach($complaints as $candidates_company){
            array_push($companies_array, $candidates_company->company_id);
        }
        $counts = array_count_values($companies_array);
        ksort($counts);
        $top_with_count = array_slice($counts, 0, 5, true);

        $top = array_keys($top_with_count);
        $most_appearing_company = $top[0];
        $company_name = Companies::where('id',$most_appearing_company)->get();
        foreach($company_name as $company){
            return $company->company_name;
        }
    }

    private function getNumberOfComplaintsWithCompanyWithMostComplaints(){
        /**
         * Get the candidates complaining (groupBy created_by id)
         * get the company each candidate belongs to and put them in an array
         * get the number of times the company that appears most appears
         */
        $complainers_array = [];
        $complaining_candidates = Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->groupBy('complaints.created_by')->get();
        foreach($complaining_candidates as $complainers){
            array_push($complainers_array, $complainers->company_id);
        }
        $counts = array_count_values($complainers_array);
        arsort($counts);
        $top_with_count = array_slice($counts, 0, 5, true);

        $top = array_keys($top_with_count);

        $element = $top[0];

        $tmp = array_count_values($complainers_array);
        $cnt = $tmp[$element];
        return $cnt;
    }

    private function getNumberOfComplaintsWithCompanyWithLeastComplaints(){
        /**
         * Get the candidates complaining (groupBy created_by id)
         * get the company each candidate belongs to and put them in an array
         * get the number of times the company that appears most appears
         */
        $complainers_array = [];
        $complaining_candidates = Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->groupBy('complaints.created_by')->get();
        foreach($complaining_candidates as $complainers){
            array_push($complainers_array, $complainers->company_id);
        }
        $counts = array_count_values($complainers_array);
        ksort($counts);
        $top_with_count = array_slice($counts, 0, 5, true);

        $top = array_keys($top_with_count);

        $element = $top[0];

        $tmp = array_count_values($complainers_array);
        $cnt = $tmp[$element];
        return $cnt;
    }

    private function getNumberOfBoysRegistered(){
        return Candidates::where('gender','Male')->count();
    }

    private function getNumberOfGirlsRegistered(){
        return Candidates::where('gender','Female')->count();
    }

    private function getNumberOfOtherGenderRegistered(){
        return Candidates::where('gender','Rather Not Say')->count();
    }

    private function getNumberOfComplaintsMadeByMales(){
        return Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->where('candidates.gender','Male')->count();
    }

    private function getNumberOfComplaintsMadeByFemales(){
        return Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->where('candidates.gender','Female')->count();
    }

    private function getNumberOfComplaintsMadeByRatherNotSay(){
        return Complaints::join('candidates','complaints.created_by','candidates.candidates_user_id')
        ->where('candidates.gender','Rather Not Say')->count();
    }

    private function getClauses(){
        $clauses = [];
        $contract = DB::table('contracts')->get();
        foreach($contract as $contract_clause){
            array_push($clauses, $contract_clause->clause);
        }
        return $clauses;
    }

    private function getMostComplainingPerson(){
        $complainers_id = [];
        //get the complainers, put the ids in an array and check the most occuring id
        //get the person that owns the most occuring id
        $most_complaining_person = Complaints::get();
        foreach($most_complaining_person as $persons_id){
            array_push($complainers_id, $persons_id->created_by);
        }
        // return $complainers_id;
        $counts = array_count_values($complainers_id);
        arsort($counts);
        $top_with_count = array_slice($counts, 0, 500, true);

        $top = array_keys($top_with_count);

        $element = $top[0];
        // return $element;
        //getting the person with this id
        return Candidates::where('candidates_user_id',$element)->get();
    }

    private function getLeastComplainingPerson(){
        $complainers_id = [];
        //get the complainers, put the ids in an array and check the most occuring id
        //get the person that owns the most occuring id
        $most_complaining_person = Complaints::get();
        foreach($most_complaining_person as $persons_id){
            array_push($complainers_id, $persons_id->created_by);
        }
        // return $complainers_id;
        $counts = array_count_values($complainers_id);
        ksort($counts);
        $top_with_count = array_slice($counts, 0, 500, true);

        $top = array_keys($top_with_count);

        $element = $top[0];
        // return $element;
        //getting the person with this id
        return Candidates::where('candidates_user_id',$element)->get();
    }

    private function getTheNumberOfComplaintsByTheLeastComplainingPerson(){
        $complainers_id = [];
        //get the complainers, put the ids in an array and check the most occuring id
        //get the person that owns the most occuring id
        $most_complaining_person = Complaints::get();
        foreach($most_complaining_person as $persons_id){
            array_push($complainers_id, $persons_id->created_by);
        }
        // return $complainers_id;
        $counts = array_count_values($complainers_id);
        ksort($counts);
        $top_with_count = array_slice($counts, 0, 500, true);

        $top = array_keys($top_with_count);

        $element = $top[0];
        return Complaints::where('created_by',$element)->count();
    }

    private function getNumberOfComplaintsByMostComplainingPerson(){
        $complainers_id = [];
        //get the complainers, put the ids in an array and check the most occuring id
        //get the person that owns the most occuring id
        $most_complaining_person = Complaints::get();
        foreach($most_complaining_person as $persons_id){
            array_push($complainers_id, $persons_id->created_by);
        }
        // return $complainers_id;
        $counts = array_count_values($complainers_id);
        arsort($counts);
        $top_with_count = array_slice($counts, 0, 500, true);

        $top = array_keys($top_with_count);

        $element = $top[0];
        return Complaints::where('created_by',$element)->count();
    }
}
