<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(Request $request) {
 
        $lat = -20.3035282;
        $lon = -40.3018176;
            
        $data = DB::table("users")
            ->select("users.id"
                ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lon) - radians(" . $lon . ")) 
                + sin(radians(" .$lat. ")) 
                * sin(radians(users.lat))) AS distance"))
                //->groupBy("users.id")
                ->get();
 
      dd($data);
    }
}
