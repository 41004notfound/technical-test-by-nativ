<?php

use App\Http\Controllers\ApiFront\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API front routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('appointments')->as('appointments.')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
    Route::post('/', [AppointmentController::class, 'store'])->name('store');

    Route::prefix('{appointment}')->group(function () {
        Route::get('/', [AppointmentController::class, 'show'])->name('show');
    });
});
