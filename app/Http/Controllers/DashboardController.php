<?php

namespace App\Http\Controllers;

use App\Models\Client\Booking;
use App\Models\Hall;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __invoke(Hall $hall)
    {
        Session::put('hall', $hall);

        if (! $hall->hasSettings()) {
            $settings = [
                ['name' => 'days_before_booking_due_date', 'value' => '14', 'hall_id' => $hall->id],
            ];
            foreach ($settings as $setting) {
                Setting::create($setting);
            }
        }

        $events = [];

        $bookings = Booking::whereHas('bookingTime', function($query) {
            $query->where('hall_id', session('hall')->id);
        })->get();

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => 'booking of ' . $booking->customer_name,
                'start' => $booking->date . $booking->bookingTime->from,
                'end' => $booking->date . $booking->bookingTime->to
            ];

        }

        return view('halls.dashboard', ['events' => json_encode($events)]);
    }
}
