<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Booking;
use App\Models\Client\BookingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AvailableBookingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bookings_bookingTimes = [];

        $hall_bookingTimes = BookingTime::where('hall_id', session('hall')->id)
                                ->where('period', $request->period)
                                ->get();

        $formatted_date = substr(Carbon::create($request->date), 0, 10);

        $bookings = Booking::where('date', $formatted_date)
                        ->whereHas('bookingTime', function ($query) use ($request) {
                            $query
                                ->where('hall_id', session('hall')->id)
                                ->where('period', $request->period);
                        })->get();

        if ($bookings) {
            foreach ($bookings as $booking) {
                $bookings_bookingTimes[] = $booking->bookingTime->id;
            }
        }

        $available = $hall_bookingTimes->filter(function ($value) use ($bookings_bookingTimes) {
            return ! in_array($value->id, $bookings_bookingTimes);
        });

        return response()->json(['times' => $available->toArray()], 200);
    }
}
