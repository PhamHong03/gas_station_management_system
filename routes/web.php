<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Maps\MapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\LocationController;

Route::get('/get-districts/{cityId}', [LocationController::class, 'getDistricts']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWards']);

Route::get('/', [MapController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => 'admin', 'middleware' => ['admin.check']], function () {
    Route::get('/index', [MainController::class, 'index'])->name('admin');
    // Users
    Route::get('/users/list', [UserController::class, 'list'])->name('admin.users.list');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
    // Companies
    Route::get('/companies/list', [CompanyController::class, 'list'])->name('admin.companies.list');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.companies.create');
    Route::post('/companies/create', [CompanyController::class, 'store'])->name('admin.companies.store');
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('admin.companies.edit');
    Route::post('/companies/edit/{id}', [CompanyController::class, 'update'])->name('admin.companies.update');
    Route::get('/companies/delete/{id}', [CompanyController::class, 'delete'])->name('admin.companies.delete');
});
