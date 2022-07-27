<?php

namespace App\Http\Controllers\Client;

use App\Events\MadeBookingPayment;
use App\Events\RevenueCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewBookingRequest;
use App\Http\Requests\Client\UpdateBookingRequest;
use App\Models\Client\Booking;
use App\Models\Client\Customer;
use App\Models\Hall;
use App\Models\Client\Offer;
use App\Models\Client\Service;
use Illuminate\Http\Request;

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
        $services = Service::all();
        $customers = Customer::whereHas('user', function ($query) {
            $query->where('hall_id', session('hall')->id);
        })->get();

        return view('client.bookings.create', compact('offers', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewBookingRequest $request)
    {
        $booking = Booking::create($request->validated());

        event(new RevenueCreated($booking));

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
    public function show(Hall $hall, Booking $booking)
    {
        $hall->client->user->notifications->markAsRead();

        return view('client.bookings.show', compact('booking'));
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
        $services = Service::all();
        return view('client.bookings.edit', compact('offers', 'services', 'booking'));
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
        $attributes = $request->except(['date', 'bookingTime_id']);

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

    public function makePayment(Request $request, Hall $hall, Booking $booking)
    {
        $request->validate([
            'paid' => ['required', 'numeric'],
            'invoice' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        $paid = $booking->paid + $request->paid;
        $remaining = $booking->remaining - $request->paid;

        $booking->update(['paid' => $paid, 'remaining' => $remaining]);

        event(new MadeBookingPayment($paid, now(), $booking));
    }
}
