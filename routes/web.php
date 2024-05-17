<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware('auth')->group(function () {
    Route::get('/vehicles', 'VehicleController@index')->name('vehicles.index');

    // admin post vehicles name
    Route::post('/name-vehicles', 'VehicleController@store')->name('vehicles.store');

    // admin post vehicle
    Route::post('/vehicles', 'VehicleController@storeVehicle')->name('vehicles.storeVehicle');

    Route::get('/vehicles/show/{id}', 'VehicleController@show')->name('vehicles.show');

    // update name vehicles
    Route::patch('/name-vehicles/{id}', 'VehicleController@update')->name('vehicles.update');

    // update vehicle
    Route::patch('/vehicles/{id}', 'VehicleController@updateVehicle')->name('vehicles.updateVehicle');

    // delete name vehicles
    Route::delete('/name-vehicles/{id}', 'VehicleController@destroy')->name('vehicles.destroy');

    // delete vehicle
    Route::delete('/vehicles/{id}', 'VehicleController@destroyVehicle')->name('vehicles.destroyVehicle');

    Route::post('vehicles/user/borrow/{id}', 'VehicleController@borrow')->name('vehicles.borrow');
    Route::get('/vehicles/history/{id}', 'VehicleController@history')->name('vehicles.history');


    Route::get('/approval/all', 'ApprovalController@index')->name('approval.index');
    Route::patch('/approval/{id}', 'ApprovalController@updateApproval')->name('approval.update');

    Route::patch('/approval/superior/{id}', 'ApprovalController@updateApprovalSuperior')->name('superior.update');
});
