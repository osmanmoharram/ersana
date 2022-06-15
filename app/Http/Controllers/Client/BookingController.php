<?php

namespace App\Http\Controllers\Client;

use App\Events\RevenueCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewBookingRequest;
use App\Http\Requests\Client\UpdateBookingRequest;
use App\Models\Client\Booking;
use App\Models\Client\BookingTime;
use App\Models\Client\Customer;
use App\Models\Hall;
use App\Models\Client\Offer;
use App\Models\Revenue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(30);

        return view('client.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offers = Offer::all();

        return view('client.bookings.create', compact('offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewBookingRequest $request)
    {
        $attributes = $request->except(['customer']);

        $attributes['customer_name'] = $request->customer['name'];
        $attributes['customer_email'] = $request->customer['email'];
        $attributes['customer_phone'] = $request->customer['phone'];

        $booking = Booking::create($attributes);

        // event(new RevenueCreated($booking));

        return redirect()
            ->route('halls.bookings.index', session('hall')->id)
            ->withMessage(__('page.bookings.flash.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('client.customers.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall, Booking $booking)
    {
        $offers = Offer::all();
        return view('client.bookings.edit', compact('offers', 'booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Hall $hall, Booking $booking)
    {
        $attributes = $request->except(['customer', 'date', 'bookingTime_id']);

        $attributes['customer_name'] = $request->customer['name'];
        $attributes['customer_email'] = $request->customer['email'];
        $attributes['customer_phone'] = $request->customer['phone'];

        if ($date = $request->date) {
            $attributes['date'] = $date;
        }

        if ($request->has('bookingTime_id')) {
            $attributes['bookingTime_id'] = $request->bookingTime_id;
        }

        $booking->update($attributes);

        return redirect()
            ->route('halls.bookings.index', session('hall')->id)
            ->withMessage(__('page.bookings.flash.updated', ['booking' => $booking->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall, Booking $booking)
    {
        $booking_id = $booking->id;

        $booking->delete();

        return redirect()
            ->route('halls.bookings.index', session('hall')->id)
            ->withMessage(__('page.bookings.flash.deleted', ['booking' => $booking_id]));
    }
}
