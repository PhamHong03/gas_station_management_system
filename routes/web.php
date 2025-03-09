<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Maps\MapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;



Route::get('/', [MapController::class, 'index'])->name('index');



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
// Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [MainController::class, 'index'])->name('admin');
});
