<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Maps\MapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FuelTypeController;
use App\Http\Controllers\Admin\GasStationController;
use App\Http\Controllers\Admin\GasStationFuelController;

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
    // Fuel Types
    Route::get('/fuel-types/list', [FuelTypeController::class, 'list'])->name('admin.fuel-types.list');
    Route::get('/fuel-types/create', [FuelTypeController::class, 'create'])->name('admin.fuel-types.create');
    Route::post('/fuel-types/create', [FuelTypeController::class, 'store'])->name('admin.fuel-types.store');
    Route::get('/fuel-types/edit/{id}', [FuelTypeController::class, 'edit'])->name('admin.fuel-types.edit');
    Route::post('/fuel-types/edit/{id}', [FuelTypeController::class, 'update'])->name('admin.fuel-types.update');
    Route::get('/fuel-types/delete/{id}', [FuelTypeController::class, 'delete'])->name('admin.fuel-types.delete');
    // Fuel Prices\
    Route::get('/fuel-prices/list', [PriceController::class, 'list'])->name('admin.fuel-prices.list');
    Route::get('/fuel-prices/create', [PriceController::class, 'create'])->name('admin.fuel-prices.create');
    Route::post('/fuel-prices/create', [PriceController::class, 'store'])->name('admin.fuel-prices.store');
    Route::get('/fuel-prices/edit/{id}', [PriceController::class, 'edit'])->name('admin.fuel-prices.edit');
    Route::post('/fuel-prices/edit/{id}', [PriceController::class, 'update'])->name('admin.fuel-prices.update');
    Route::get('/fuel-prices/delete/{id}', [PriceController::class, 'delete'])->name('admin.fuel-prices.delete');
    // Gas Stations
    Route::get('/gas-stations/list', [GasStationController::class, 'list'])->name('admin.gas-stations.list');
    Route::get('/gas-stations/create', [GasStationController::class, 'create'])->name('admin.gas-stations.create');
    Route::post('/gas-stations/create', [GasStationController::class, 'store'])->name('admin.gas-stations.store');
    Route::get('/gas-stations/edit/{id}', [GasStationController::class, 'edit'])->name('admin.gas-stations.edit');
    Route::post('/gas-stations/edit/{id}', [GasStationController::class, 'update'])->name('admin.gas-stations.update');
    Route::get('/gas-stations/delete/{id}', [GasStationController::class, 'delete'])->name('admin.gas-stations.delete');
    // Gas Station Fuel
    Route::get('/gas-station-fuel/list/{id}', [GasStationFuelController::class, 'list'])->name('admin.gas-station-fuel.list');
    Route::get('/gas-station-fuel/create/{id}', [GasStationFuelController::class, 'create'])->name('admin.gas-station-fuel.create');
    Route::post('/gas-station-fuel/create/{id}', [GasStationFuelController::class, 'store'])->name('admin.gas-station-fuel.store');
    Route::get('/gas-station-fuel/edit/{id}', [GasStationFuelController::class, 'edit'])->name('admin.gas-station-fuel.edit');
    Route::post('/gas-station-fuel/edit/{id}', [GasStationFuelController::class,'update'])->name('admin.gas-station-fuel.update');
    Route::get('/gas-station-fuel/delete/{id}', [GasStationFuelController::class, 'delete'])->name('admin.gas-station-fuel.delete');

});
