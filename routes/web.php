<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//search welcome page
Route::get('/getme','live_searchcontroller@index');
Route::get('/search','live_searchcontroller@search');
Route::get('live_search', 'SearchController@index');
Route::get('live_search/action', 'SearchController@action')->name('live_search.action');
//reset password offline
Route::post('/stan', 'OfflineController@reset');
//update users' avatar
Route::post('/avatarupdate', 'HomeController@avatarupdate');
 //update user
 Route::get('/updateprofile{id}', 'HomeController@updateuser');
 Route::post('/updateprofile', 'HomeController@updateuserinfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['auth', 'admin']], function(){

//pie charts
Route::get('allsaleschart-view', 'ChatController@index');

//linechart
    Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');
    //admin dashbord
    Route::get('/dashbord', function () {
        return view('admin.Dashbord');
    });
//admin dashord
    Route::get('/admin', function () {
        return view('admin.Dashbord');
    });
 //get all products
 Route::get('/stocktaking', 'productscontroller@getproducts');

 //adding item
 Route::post('/additem', 'productscontroller@additem');

 //Update item
 Route::post('/updateitem', 'productscontroller@updateitem');

  //search item
  Route::match(array('GET','POST'),'/searchitem', 'productscontroller@searchitem');

 //sales
 Route::get('/sales{id}', 'productscontroller@sales');
//add new sales record
Route::post('/sale', 'productscontroller@sale');
//modified search
 Route::post('/modifiedsearch', 'productscontroller@modifiedsearch');
//update sales
Route::post('/updatesales', 'productscontroller@updatesales');

 //full sales record
 Route::get('/allsales', 'productscontroller@allsales');

 //users
 Route::get('/users', 'admincontroller@users');

  //search user
  Route::match(array('GET','POST'),'/searchuser', 'admincontroller@searchuser');

 //update user
 Route::get('/updateuser{id}', 'admincontroller@updateuser');
 Route::post('/updateuser', 'admincontroller@updateuserinfo');

  //delete user
  Route::get('/deleteuser{id}', 'admincontroller@deleteuser');

 //customers
 Route::get('/customers', 'JobsController@index');
 //add customer
 Route::post('/addcustomer', 'JobsController@addcustomer');
 //jobs
 Route::get('/jobs{id}', 'JobsController@jobs');
 //checkout item
 Route::get('/checkout{id}', 'JobsController@checkoutitem');
});
