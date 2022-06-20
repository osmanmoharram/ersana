<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Client\AvailableBookingTimeController;
use App\Models\Client\Booking;
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

Route::get('/{client}/halls', [HallController::class, 'index']);

Route::get('halls/{hall}/available-booking-times', AvailableBookingTimeController::class);

// Get all bookings
Route::get('/halls/bookings', function () {
    // $bookings = Booking::whereHas('bookingTime', function ($query) {
    //     $query->where('hall_id', session('hall')->id);
    // })->get();

    // return response()->json(compact('bookings'), 200);

    return response()->json(['message' => 'this is a message'], 200);
});

// Make a new booking
Route::post('/bookings', [BookingController::class, 'store']);

// Edit existing booking
Route::get('bookings/{booking}/edit', [BookingController::class, 'edit']);

// Update existing booking
Route::patch('/bookings/{booking}', [BookingController::class, 'update']);

// Delete existing booking
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy']);
