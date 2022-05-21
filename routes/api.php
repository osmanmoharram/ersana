<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('halls/{hall}/booking-times', [\App\Http\Controllers\Api\BookingTimeController::class, 'index'])
    ->name('booking_times.index');

// Make a new booking
Route::post('/bookings', [\App\Http\Controllers\Api\BookingController::class, 'store'])
    ->name('halls.bookings.store');

// Edit existing booking
Route::get('/bookings/{booking}/edit', [\App\Http\Controllers\Api\BookingController::class, 'edit'])
    ->name('halls.bookings.edit');

// Update existing booking
Route::patch('/bookings/{booking}', [\App\Http\Controllers\Api\BookingController::class, 'update'])
    ->name('halls.bookings.edit');

// Delete existing booking
Route::delete('/bookings/{booking}', [\App\Http\Controllers\Client\BookingController::class, 'destroy'])
    ->name('halls.bookings.destroy');
