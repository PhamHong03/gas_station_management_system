<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Maps\MapController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Maps\GasStationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MapController::class, 'index']);


Route::get('/admin', [MainController::class, 'index']);


Route::get('/gas-station',[GasStationController::class,'findNearestGasStations']);

Route::get('/gas-station/Findway', [GasStationController::class, 'findGasStationsByLocation']);