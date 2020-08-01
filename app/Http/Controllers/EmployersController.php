<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employers;
use App\Http\Resources\EmployersResource;
use App\User;
use Illuminate\Support\Facades\Hash;

class EmployersController extends Controller
{

    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
    }

    private function createEmployers(){
        //creating an account for the employer
        $this->registerNewEmployer();
        $employer_photo = request()->photo;
        $employer_photo_needed = $employer_photo->getClientOriginalName();
        $employer_photo->move('employer_photos/',$employer_photo_needed);

        $employer = new Employers;
        $employer->efirst_name = request()->first_name;
        $employer->elast_name  = request()->last_name;
        $employer->eother_name = request()->other_name;
        $employer->contact    = request()->contact;
        $employer->address    = request()->address;
        $employer->created_by = $this->authenticated_user->getLoggedInUser();
        $employer->photo      = $employer_photo_needed;
        $employer->save();
        return redirect()->back()->with('msg','New employer has been created successfully');
    }
    protected function validateEmployers(){
        if(empty(request()->photo)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers photo to continue");
        }elseif(empty(request()->first_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers first name to continue");
        }elseif(empty(request()->last_name)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers last name to continue");
        }elseif(empty(request()->contact)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers contact to continue");
        }elseif(empty(request()->address)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers Address to continue");
        }elseif(empty(request()->email)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers Email address to continue");
        }elseif(empty(request()->password)){
            return redirect()->back()->withInput()->withErrors("Please enter the Password to continue");
        }elseif(request()->password != request()->password_confirm){
            return redirect()->back()->withInput()->withErrors("Please make sure the two passwords match");
        }elseif(Employers::where('contact',request()->contact)){
            return redirect()->back()->withInput()->withErrors("The supplied phone number is already registered hence can't be used again");
        }else{
            return $this->createEmployers();
        }
    }

    private function registerNewEmployer(){
        $employer = new User;
        $employer->email = request()->email;
        $employer->category_id = 2; //employer
        $employer->name  = request()->first_name .' '. request()->last_name .' '. request()->other_name;
        $employer->password = Hash::make(request()->password);
        $employer->save();
    }

    public function getEmployers(){
        $all_employers = Employers::all();
        return view('admin.employers',compact('all_employers'));
    }
    public function changeEmployers($id){
        return Employers::where('id',$id)->update(array('id'=>'2'));
    }
    public function removeEmployers($id){
        return Employers::where('id',$id)->delete();
    }
}
