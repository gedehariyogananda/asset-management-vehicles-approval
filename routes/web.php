<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ProfileController::class)->prefix('profile')->group(function () {
    Route::get('/', 'index')->name('profile');
    Route::put('/', 'update')->name('profile.update');
});


Route::middleware('auth')->group(function () {
    Route::controller(VehicleController::class)
        ->prefix('vehicles')
        ->name('vehicles.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/name', 'store')->name('store');
            Route::post('/', 'storeVehicle')->name('storeVehicle');
            Route::get('/show/{id}', 'show')->name('show');
            Route::patch('/names{id}', 'update')->name('update');
            Route::patch('/{id}', 'updateVehicle')->name('updateVehicle');
            Route::delete('/{id}/name', 'destroy')->name('destroy');
            Route::delete('/{id}', 'destroyVehicle')->name('destroyVehicle');
            Route::post('user/borrow/{id}', 'borrow')->name('borrow');
            Route::get('/history/{id}', 'history')->name('history');
            Route::get('/export', 'exportVehiclesUser')->name('export');
        });

    Route::controller(ApprovalController::class)
        ->prefix('approval')
        ->name('approval.')
        ->group(function () {
            Route::get('/all', 'index')->name('index');
            Route::patch('/{id}', 'updateApproval')->name('update');
        });

    Route::patch('/approval/superior/{id}', [ApprovalController::class, 'updateApprovalSuperior'])->name('superior.update');
});
