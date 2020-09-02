<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\products;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Chatify\Http\Models\Message;
use Chatify\Http\Models\Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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


        //update avatar
        public function avatarupdate(Request $request)
        {
            $msg = null;
            $error = $success = 0;
            $id=$request->id;
            $user=User::find($id);
            // if there is a [file]
            if ($request->hasFile('avatar')) {
                // allowed extensions
                //$allowed_images = Chatify::getAllowedImages();
    
                $file = $request->file('avatar');
                // if size less than 150MB
                if ($file->getSize() < 150000000) {
                    $avatar = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $update = User::where('id', $user->id)->update(['avatar' => $avatar]);
                    $file->storeAs("public/" . config('chatify.user_avatar.folder'), $avatar);
                    $success = $update ? 1 : 0;
                }
            }
    
            // send the response
            return back()->with('status','Avatar changed');
            /* Response::json([
                'status' => $success ? 1 : 0,
                'error' => $error ? 1 : 0,
                'message' => $error ? $msg : 0,
            ], 200);  */
        }
}
