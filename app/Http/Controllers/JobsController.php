<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Customers;
use App\products;
use App\sales;
use App\User;
use App\Jobs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class JobsController extends Controller
{
    //display all customers and register form
    public function index(){

        $customers=Customers::all();

        return view('admin.customers')->with('customers', $customers);
    }
    //adding new customer
    public function addcustomer(Request $request){
       $phone=$request->phone;
       $name=$request->name;
       $item=$request->item;
       $description=$request->description;
       $price=$request->price;
       //check if customer exists and  change status
       $custom=Customers::where('phone',$phone)->get();
       
       if(count($custom)>0){
           //update status
       $customer=Customers::where('phone',$phone)
       ->update(['status' => 1]);
       
       }else{
           //add new customer
           $customer=new Customers;
           $customer->user=$name;
           $customer->phone=$phone;
           $customer->status= 1;
           $customer->save();
           // send welcome sms to customer
                 //
           
       }
       //add item to queue
     $job=new Jobs;
       $job->phone=$phone;
       $job->user=$name;
       $job->item=$item;
       $job->description=$description;
       $job->price=$price;
       $job->status=1;
       $job->save();
       //send sms to customer
           //
       
       //redirect back with status
       return back()->with('status', 'Job Added Successifully');
    
    }
    //view individual customer jobs
    public function jobs(Request $request){
        $phone=$request->id;
        $jobs=jobs::where('phone', $phone)->get();
      
        
    // redirect to jobs page
       return view('admin.jobs')->with('jobs', $jobs);
    }
    //checkout item
    public function checkoutitem(Request $request){
           $id=$request->id;
           $job=Jobs::find($id);
           $phone=$job->phone;
           if($job->status== 0){
               //redirect back with error
               return back()->with('status', 'FAILED!! Item Already checked out');
           }else{
           $job->status= 0 ;
           $job->save();
           //change customer status
           $coun=jobs::where('phone', $phone)->sum('status');
        if($coun <= 0){
            $newstatus=Customers::where('phone',$phone)
            ->update(['status' => 0]);               
        }
           //send sms to customer
                 //
           //redirect back with success status
           return back()->with('status', 'Item Checked Out Successifully');
           }
    }
}
