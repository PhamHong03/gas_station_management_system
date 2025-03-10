<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Maps\MapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;

Route::get('/', [MapController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => 'admin', 'middleware' => ['admin.check']], function () {
    Route::get('/index', [MainController::class, 'index'])->name('admin');
    Route::get('/users/list', [UserController::class, 'list'])->name('admin.users.list');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
});
