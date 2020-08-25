<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employers;
use App\Http\Resources\EmployersResource;
use App\User;
use App\EmployerEmployeeContract;
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
        $employer->efirst_name = request()->name;
        $employer->elast_name  = request()->last_name;
        $employer->eother_name = request()->other_name;
        $employer->econtact    = request()->contact;
        $employer->address    = request()->address;
        $employer->created_by = $this->authenticated_user->getLoggedInUser();
        $employer->photo      = $employer_photo_needed;
        $employer->save();
        return redirect()->back()->with('msg','New employer has been created successfully');
    }
    protected function validateEmployers(){
        if(empty(request()->photo)){
            return redirect()->back()->withInput()->withErrors("Please enter the Employers photo to continue");
        }elseif(empty(request()->name)){
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
        }elseif(Employers::where('contact',request()->contact)->exists()){
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
        $all_employers = Employers::where('status','active')->get();
        return view('admin.employers',compact('all_employers'));
    }
    public function changeEmployers($id){
        Employers::where('id',$id)->update(array(
            'efirst_name' => request()->efirst_name,
            'elast_name'  => request()->elast_name,
            'eother_name' => request()->eother_name,
            'econtact'    => request()->econtact,
            'address'     => request()->address,
            'photo'       => request()->photo,
            'updated_by'  => $this->authenticated_user->getLoggedInUser()
        ));
        return redirect()->back()->with('msg','You successfully edited information for an employer');
    }

    protected function viewAllAboutEmployer($id){
        $employers_info = Employers::where('id',$id)->get();
        return view('admin.view_employers_info',compact('employers_info'));
    }

    public function removeEmployers($id){
        if(EmployerEmployeeContract::where('employer_id',$id)->where('contract_status','active')->exists()){
            return redirect()->back()->withErrors("The Employer has an ongoing contract with a domestic worker and can't be deleted, 
            Kindly terminate the contract for the employer to be deleted");
        }else{
            Employers::where('id',$id)->update(array(
                'status' => 'deleted'
            ));
        }

        return redirect()->back()->with('msg',"Employee has been deleted successfully");
    }
}
