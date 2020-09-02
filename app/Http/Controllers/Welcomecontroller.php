<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\customers;
use App\products;
use App\sales;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;


class Welcomecontroller extends Controller
{
    public function index(){
        return view("admin.editwelcome");
    }
}
