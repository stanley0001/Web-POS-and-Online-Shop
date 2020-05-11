<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
class live_searchcontroller extends Controller
{
    public function index(){
        return view('search');
    }
    public function search(Request $request){
        echo "hey";
        
        if($request->ajax()) {
          
            $data = User::where('name', 'LIKE', $request->country.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
}