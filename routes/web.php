<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Maps\MapController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MapController::class, 'index']);


Route::get('/admin', [MainController::class, 'index']);