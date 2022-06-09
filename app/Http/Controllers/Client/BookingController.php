<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewBookingRequest;
use App\Http\Requests\Client\UpdateBookingRequest;
use App\Models\Client\Booking;
use App\Models\Client\Customer;
use App\Models\Client\Hall;
use App\Models\Client\Offer;

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
        Booking::create([
            'customer_name' => $request->customer['name'],
            'customer_email' =>  $request->customer['email'],
            'customer_phone' => $request->customer['phone'],
            'date' => $request->date,
            'bookingTime_id' => $request->bookingTime_id,
            'offer_id' => $request->offer_id,
            'payment_method' => $request->payment_method,
            'paid_amount' => $request->paid_amount,
            'remaining_amount' => $request->remaining_amount,
            'total' => $request->total,
            'status' => $request->status,
            'notes' => $request->notes
        ]);

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
        $customers = Customer::all();
        return view('client.bookings.edit', compact('customers', 'booking'));
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
        $booking->update($request->validated());

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
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json(200);
    }
}
