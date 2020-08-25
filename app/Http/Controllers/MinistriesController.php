<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\User;
use App\Complaints;

class MinistriesController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
        $this->user_instance = new UserController;
    }

    public function getAllMinistries(){
        $all_ministries = Ministry::where('status','active')->get();
        $number_of_messages_sent_to_ministry = Complaints::where('status','ministry')->count();
        return view('admin.ministries',compact('all_ministries','number_of_messages_sent_to_ministry'));
    }

    private function createMinistry(){
        //creating a ministry user
        //the passed parameter 4 differetiates the ministry from the other users
        $this->user_instance->createUser(4);
        $ministry = new Ministry;
        $ministry->ministry_name = request()->name;
        $ministry->created_by    = $this->authenticated_user->getLoggedInUser();
        $ministry->save();
        return redirect()->back()->with('msg','A new ministry has been created successfully');
    }

    protected function editMinistry($id){
        $edit_ministry = Ministry::where('id',$id)->update(array(
            'ministry_name' => request()->name,
            'created_by'    => $this->authenticated_user->getLoggedInUser()
        ));
        return redirect()->back()->with('msg','Ministry information has been updated successfully');
    }

    protected function validateMinistry(){
        if(empty(request()->name)){
            return redirect()->back()->withInput()->withErrrors("Please enter the ministry name to continue");
        }elseif(empty(request()->email)){
            return redirect()->back()->withInput()->withErrors("Please enter the ministry email to continue");
        }elseif(empty(request()->password)){
            return redirect()->back()->withInput()->withErrors("Please enter the ministry password to continue");
        }elseif(request()->password != request()->password_confirm){
            return redirect()->back()->withInput()->withErrors("Please enter make sure the two passwords match to continue");
        }elseif(User::where('email',request()->email)->exists()){
            return redirect()->back()->withInput()->withErrors("The supplies email has already been used");
        }else{
            return $this->createMinistry();
        }
    }
}
