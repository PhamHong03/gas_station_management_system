<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GasStation;

class MapController extends Controller
{
    // public function index(){
        
    //     return view('clients.layouts.homepage');
    // }
    
    public function index() {
        $gasStations = GasStation::with('review.user')->get(); // Lấy trạm xăng cùng đánh giá
        return view('clients.layouts.homepage', compact('gasStations'));
    }
    

}
