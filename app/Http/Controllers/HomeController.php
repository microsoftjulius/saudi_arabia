<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaints;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $number_of_employers  = $this->countEmployers();
        $number_of_employees  = $this->countEmployees();
        $number_of_complaints = $this->countComplaints();
        $number_of_user       = $this->countAllUsers();
        return view('welcome', compact('number_of_employees','number_of_employers','number_of_complaints','number_of_user'));
    }

    private function countEmployers(){
        return User::where('category_id',2)->count();
    }

    private function countEmployees(){
        return User::where('category_id',5)->count();
    }

    private function countComplaints(){
        return Complaints::count();
    }

    private function countAllUsers(){
        return User::count();
    }
}
