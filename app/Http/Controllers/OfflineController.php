<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OfflineController extends Controller
{
    public function reset(Request $request){
        $email=$request->email;
        $user1=User::where('email', $email)->get();
        if(count($user1)>0){
        foreach($user1 as $user1){
        $password=Hash::make($user1->phone);


        }
        //send verification code via sms
           //
        //change password
       $user=User::where('email', $email)
                 ->update(['password'=>$password]);
                 return redirect('/login')->with('status', 'Password Reset successifully. please login with your phone number as password');
    }else{
        return back()->with('status', 'User Does not exist, Double Check your Email');

}

}
}
