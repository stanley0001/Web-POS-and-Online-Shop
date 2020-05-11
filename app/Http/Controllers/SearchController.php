<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;

class SearchController extends Controller
{
    public function index(){
        
        return view('welcome');
    }
    public function action(Request $request){

        if($request->ajax()){
           
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('users')
                ->where('name', 'like', '%'.$query.'%')
                ->orwhere('fastname', 'like', '%'.$query.'%')
                ->orwhere('lastname', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();

            }else{
                
                $data = DB::table('users')
                ->orderBy('id', 'desc')
                ->get();
            }
            $total_row =$data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $output = '
                    <tr>
                    <td>'.$row->name.'</td>
                    <td>'.$row->fastname.'</td>
                    <td>'.$row->lastname.'</td>
                    </tr>
                    ';
                }

            }else{
                
                $output = '
                <tr>
                <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            
            $data =array(
                'table_data'     => $output,
                'total_data'     => $total_data
            );

            echo json_encode($data);
        }
       
    }
}
