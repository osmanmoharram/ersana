<?php

namespace App\Http\Controllers;

use App\Models\Client\Booking;
use App\Models\Hall;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function showHallDashboard(Hall $hall)
    {
        Session::put('hall', $hall);

        $this->initializeHallSettings($hall);

        return view('halls.dashboard', ['events' => json_encode($this->getEvents())]);
    }

    public function showAdminDashboard()
    {
        return view('admin.dashboard');
    }

    protected function getEvents()
    {
        $events = [];

        $bookings = Booking::whereHas('bookingTime', function ($query) {
                        $query->where('hall_id', session('hall')->id);
                    })->whereIn('status', ['confirmed', 'temporary'])->get();

        foreach ($bookings as $key => $booking) {
            $events[$key]['title'] = $booking->customer_name;
            $events[$key]['start'] = $booking->date->setTimeFromTimeString($booking->bookingTime->from)->toDateTimeString();
            $events[$key]['end'] = $booking->date->setTimeFromTimeString($booking->bookingTime->to)->toDateTimeString();
        }

        return $events;
    }

    protected function initializeHallSettings($hall)
    {
        if (! $hall->hasSettings()) {
            $settings = [
                ['name' => 'days_before_booking_due_date', 'value' => '14', 'hall_id' => $hall->id],
            ];
            foreach ($settings as $setting) {
                Setting::create($setting);
            }
        }
    }
}
