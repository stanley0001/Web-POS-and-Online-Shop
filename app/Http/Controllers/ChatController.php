<?php
   
namespace App\Http\Controllers;
 
use App\User;
use App\sales;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
use Carbon\Carbon;
 
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
 $record = sales::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("sum(price) as price"), \DB::raw("DAY(created_at) as day"))
    ->where('created_at', '>', Carbon::today()->subDay(6))
    ->groupBy('day_name','day')
    ->orderBy('day')
    ->get();
    $todaysrecord=sales::where('created_at', '>', Carbon::today())
                   ->get();
   
    $details=User::where('usertype', 'admin')->get();
  
    $data = [];
 
     foreach($record as $row) {
        $data['label'][] = $row->day_name;
        $data['data'][] = (int) $row->price;
        $data['count'][] = (int) $row->count;
      }
   $data['users'] = $details;
   $data['todaysrecord'] =$todaysrecord;
    $data['chart_data'] = json_encode($data);
    return view('chart-js')->with($data); 
    }
 
}