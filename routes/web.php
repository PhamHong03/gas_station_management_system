<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FuelTypeController;
use App\Http\Controllers\Admin\GasStationController;
use App\Http\Controllers\Admin\GasStationFuelController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Company\CompanyController as CompanyCompanyController;
use App\Http\Controllers\Company\GasStationController as CompanyGasStationController;
use App\Http\Controllers\Company\GasStationFuelController as CompanyGasStationFuelController;
use App\Http\Controllers\Company\PriceController as CpnPriceController;
use App\Http\Controllers\GeoJsonController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Maps\GasStationController as Gas;
use App\Http\Controllers\Maps\MapController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/get-districts/{cityId}', [LocationController::class, 'getDistricts']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWards']);
Route::get('/generate-geojson', [GeoJsonController::class, 'generateGeoJson']);

Route::get('/', [MapController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Review

// Route::post('/reviews/{id}', [ReviewController::class, 'store'])->name('user.review');
Route::post('/reviews/store', [App\Http\Controllers\Maps\ReviewController::class, 'store'])->name('reviews.store');


Route::get('/gas-station/FindGas', [Gas::class, 'findNearestGasStations']);
Route::get('/gas-station/FindBy', [Gas::class, 'findGasStationsByLocation']);

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
    // Fuel Prices
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
    Route::post('/gas-station-fuel/edit/{id}', [GasStationFuelController::class, 'update'])->name('admin.gas-station-fuel.update');
    Route::get('/gas-station-fuel/delete/{id}', [GasStationFuelController::class, 'delete'])->name('admin.gas-station-fuel.delete');

});

Route::group(['prefix' => 'company', 'middleware' => ['company.check']], function () {
    Route::get('/index', [CompanyCompanyController::class, 'index'])->name('company.index');
    // Fuel Prices
    Route::get('/fuel-prices/list', [CpnPriceController::class, 'list'])->name('company.fuel-prices.list');
    Route::get('/fuel-prices/create', [CpnPriceController::class, 'create'])->name('company.fuel-prices.create');
    Route::post('/fuel-prices/create', [CpnPriceController::class, 'store'])->name('company.fuel-prices.store');
    Route::get('/fuel-prices/edit/{id}', [CpnPriceController::class, 'edit'])->name('company.fuel-prices.edit');
    Route::post('/fuel-prices/edit/{id}', [CpnPriceController::class, 'update'])->name('company.fuel-prices.update');
    Route::get('/fuel-prices/delete/{id}', [CpnPriceController::class, 'delete'])->name('company.fuel-prices.delete');
    // Gas Stations
    Route::get('/gas-stations/list', [CompanyGasStationController::class, 'list'])->name('company.gas-stations.list');
    Route::get('/gas-stations/create', [CompanyGasStationController::class, 'create'])->name('company.gas-stations.create');
    Route::post('/gas-stations/create', [CompanyGasStationController::class, 'store'])->name('company.gas-stations.store');
    Route::get('/gas-stations/edit/{id}', [CompanyGasStationController::class, 'edit'])->name('company.gas-stations.edit');
    Route::post('/gas-stations/edit/{id}', [CompanyGasStationController::class, 'update'])->name('company.gas-stations.update');
    Route::get('/gas-stations/delete/{id}', [CompanyGasStationController::class, 'delete'])->name('company.gas-stations.delete');
    // Gas Station Fuel
    Route::get('/gas-station-fuel/list/{id}', [CompanyGasStationFuelController::class, 'list'])->name('company.gas-station-fuel.list');
    Route::get('/gas-station-fuel/create/{id}', [CompanyGasStationFuelController::class, 'create'])->name('company.gas-station-fuel.create');
    Route::post('/gas-station-fuel/create/{id}', [CompanyGasStationFuelController::class, 'store'])->name('company.gas-station-fuel.store');
    Route::get('/gas-station-fuel/edit/{id}', [CompanyGasStationFuelController::class, 'edit'])->name('company.gas-station-fuel.edit');
    Route::post('/gas-station-fuel/edit/{id}', [CompanyGasStationFuelController::class, 'update'])->name('company.gas-station-fuel.update');
    Route::get('/gas-station-fuel/delete/{id}', [CompanyGasStationFuelController::class, 'delete'])->name('company.gas-station-fuel.delete');

});
