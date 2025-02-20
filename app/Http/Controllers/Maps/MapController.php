<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        return view('maps.index');
    }
}
