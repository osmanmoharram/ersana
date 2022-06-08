<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Booking;
use App\Models\Client\BookingTime;
use Illuminate\Http\Request;

class AvailableBookingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $bookings_bookingTimes = [];

        $hall_bookingTimes = BookingTime::where('hall_id', session('hall')->id)
                                ->where('period', request('period'))->get();

        $bookings = Booking::where('date', request('date')[0])
                        ->whereHas('bookingTime', function ($query) {
                            $query
                                ->where('hall_id', session('hall')->id)
                                ->where('period', '=', request('period'));
                        })->get();

        if ($bookings) {
            foreach ($bookings as $booking) {
                $bookings_bookingTimes[] = $booking->bookingTime;
            }
        }

        $available = $hall_bookingTimes->filter(function ($value) use ($bookings_bookingTimes) {
            return ! in_array($value, $bookings_bookingTimes);
        });

        return response()->json(['times' => $available->toArray()], 200);
    }
}
