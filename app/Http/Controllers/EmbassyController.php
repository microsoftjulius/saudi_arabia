<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Embassy;
use App\User;
use App\Complaints;

class EmbassyController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedUserController;
        $this->user_instance = new UserController;
    }

    protected function getAllEmbassies(){
        $all_embassies = Embassy::all();
        $messages_sent_to_embassy = Complaints::where('status','embassy')->count();
        return view('admin.embassies',compact('all_embassies','messages_sent_to_embassy'));
    }

    protected function validatedEmbassy(){
        if(empty(request()->name)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy name to continue");
        }elseif(empty(request()->embassy_location)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy location to continue");
        }elseif(empty(request()->email)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy email to continue");
        }elseif(empty(request()->password)){
            return redirect()->back()->withInput()->withErrors("Please enter the embassy password to continue");
        }elseif(empty(request()->embassy_cpassword)){
            return redirect()->back()->withInput()->withErrors("Please confirm the embassy password to continue");
        }elseif(request()->embassy_cpassword != request()->password){
            return redirect()->back()->withInput()->withErrors("make sure the two passwords match");
        }elseif(User::where('email',request()->email)->exists()){
            return redirect()->back()->withInput()->withErrors("The supplies email has already been used");
        }else{
            return $this->createEmbassy();
        }
    }

    private function createEmbassy(){
        //creating a new embassy user
        $this->user_instance->createUser(3);
        $embassy = new Embassy;
        $embassy->embassy_name = request()->name;
        $embassy->embassy_location = request()->embassy_location;
        $embassy->created_by   = $this->authenticated_user->getLoggedInUser();
        $embassy->save();
        return redirect()->back()->with('msg','A new embassy has been created successfully');
    }

    protected function editEmbassyInfo($id){
        Embassy::where('id',$id)->update(array(
            'embassy_name'     => request()->name,
            'embassy_location' => request()->embassy_location,
            'created_by'       => $this->authenticated_user->getLoggedInUser()
        ));
        return redirect()->back()->with('msg','Embassy information has been updated successfully');
    }
}
