<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\products;

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
        return view('home');
    }
    public function updateuser(Request $request){
        $id=$request->id;
        $user=User::find($id);
        return view('user.update')->with('user', $user);

    }
        //update user
        public function updateuserinfo(Request $request){
            //getting data from the form
            $id=$request->id;
            $name=$request->username;
            $email=$request->email;
            $fastname=$request->firstname;
            $lastname=$request->lastname;
            $phone=$request->phone;
            $aboutme=$request->aboutme;
            //updatefields
            $user=User::find($id);
            $user->name=$name;
            $user->email=$email;
            $user->fastname=$fastname;
            $user->lastname=$lastname;
            $user->phone=$phone;
            $user->aboutme=$aboutme;
            $user->save();
            if($request->newpassword!=""){
                //upadate password field
            $password1=$request->newpassword;
            $password2=$request->confirmpassword;
            if($password1==$password2){
                $user->password=Hash::make($password1);
                $user->save();
                return back()->with('status', 'User Details And Password Updated Successifully');
            }else{
                return back()->with('status', 'password do not match');
            }
    
            }
    
            return back()->with('status', 'User Details Updated Successifully');
        }
}
