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

class productscontroller extends Controller
{
     public function additem(Request $request){

    //getting data from form
    $item=$request->item;
    $description=$request->description;
    $quantity=$request->quantity;
    $buyingprice=$request->bp;
    $sellingprice=$request->sp;

    //creating new record
    $product=new products;
    $product->item=$item;
    $product->description=$description;
    $product->quantity=$quantity;
    $product->buying_price=$buyingprice;
    $product->selling_price=$sellingprice;
    $product->save();

    //redirect after saving
    return back()->with('status', 'Product Added Successifully');
     }

     //get all products
     public function getproducts(){
         $products=products::all();

        return view('admin.stocktaking')->with('products', $products);
     }
//updating item
     public function updateitem(Request $request){
         $id=$request->id;
         $item=$request->item;
         $description=$request->description;
         $quantity=$request->quantity;
         $price=$request->price;

         //updating record
         $product=products::find($id);
         $product->item=$item;
         $product->description=$description;
         $product->quantity=$quantity;
         $product->selling_price=$price;
         $product->save();
         
         //redirect after update
         return back()->with('status','Product Updated Successifully');
     }
     //sales
     public function sales(){
        $sales=sales::where('created_at','>', Carbon::today())->get();
       
        return view('admin.sales')->with('sales', $sales);
    }
//add new sale record
public function sale(Request $request){
    $item=$request->item;
    $description=$request->description;
    $quantity=$request->quantity;
    $price=$request->price;
     //search for item in products list
     $originalquantity=products::where('item',$item)
     ->where('description', $description)
     ->get();
     foreach($originalquantity as $originalquantity){
         $quantity1=$originalquantity->quantity;
     }
     //update record
     if(isset($quantity1)){
        $quantity2=$quantity1-$quantity;
        $product=products::where('item',$item)
                           ->where('description', $description)
                           ->update(['quantity' =>$quantity2]);
                        }
    //add to sales
    $sales=new sales;
    $sales->item=$item;
    $sales->description=$description;
    $sales->quantity=$quantity;
    $sales->price=$price;
    $sales->save();

    return back()->with('status', 'data added successifully');
}
       //update sales record
     public function updatesales(Request $request){
       $id=$request->id;
       $price=$request->price;
       $sales=sales::find($id);
       $item=$sales->item;
       $description=$sales->description;
       $quantity3=$sales->quantity;
       $quantity4=$request->quantity;
       $quantity=$quantity4-$quantity3;
       //check if product is available
       $originalquantity=products::where('item',$item)
       ->where('description', $description)
       ->get();
       foreach($originalquantity as $originalquantity){
           $quantity1=$originalquantity->quantity;
       }
       //update products table
       if(isset($quantity1)){
        $quantity2=$quantity1-$quantity;
        $product=products::where('item',$item)
                           ->where('description', $description)
                           ->update(['quantity' =>$quantity2]);
                        }
                         //update sales table
       $sales->quantity=$quantity4;
       $sales->price=$price;
       $sales->save();
       //redirect back
       return back()->with('status', 'Item Updated');
     }
    //get all sales record
    public function allsales(){
        $sales=sales::all();
        return view('admin.allsales')->with('sales', $sales);
    }
     public function searchitem(Request $request){
         $query=$request->search;
         $searchresult=products::where('item', 'LIKE', "%$query%")
                                 ->orwhere('description', 'LIKE', "%$query")
                                 ->get();

            //redirect after searching
            return view('admin.stocktaking')->with('searchresult', $searchresult);
           
     }
}
