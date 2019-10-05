<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// User Routes
Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@show');

// Manufacturer Routes
Route::get('/manufacturers', 'ManufacturerController@index');
Route::get('/manufacturers/{manufacturer}', 'ManufacturerController@show');

// Location Routes
Route::get('/locations', 'LocationController@index');
Route::get('/locations/{location}', 'LocationController@show');

// Customer Routes
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{customer}', 'CustomerController@show');

// Rental Routes
Route::get('/rentals', 'RentalController@index');
Route::get('/rentals/{rental}', 'RentalController@show');

// Vehicle Routes
Route::get('/vehicles', 'VehicleController@index');
Route::get('/vehicles/{vehicle}', 'VehicleController@show');

// Model vehicle Routes
Route::get('/model-vehicles', 'ModelVehicleController@index');
Route::get('/model-vehicles/{modelVehicle}', 'ModelVehicleController@show');

// Rental status Routes
Route::get('/rental-statuses', 'RentalStatusController@index');
Route::get('/rental-statuses/{rentalStatus}', 'RentalStatusController@show');

// Type vehicle Routes
Route::get('/type-vehicles', 'TypeVehicleController@index');
Route::get('/type-vehicles/{typeVehicle}', 'TypeVehicleController@show');



