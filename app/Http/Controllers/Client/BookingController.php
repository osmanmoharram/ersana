<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewBookingRequest;
use App\Http\Requests\Client\UpdateBookingRequest;
use App\Models\Client;
use App\Models\Client\Booking;
use App\Models\Client\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $customers = Customer::all();
        $booked = $this->getBookedDatesAndTimes();
        return view('client.bookings.create', compact('customers', 'booked'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewBookingRequest $request)
    {
        $booking = client()->run(function () use ($request) {
            return Booking::create($request->validated() + ['slug' => '00235']);
        });

        return redirect()
            ->route('client.bookings.index')
            ->withMessage(__('page.bookings.flash.created', ['booking' => $booking->slug]));
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
    public function edit(Booking $booking)
    {
        $customers = Customer::all();
        $booked = $this->getBookedDatesAndTimes($booking);
        // dd(json_encode($booked));
        return view('client.bookings.edit', compact('customers', 'booking', 'booked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        client()->run(function () use ($request, $booking) {
            $booking->update($request->validated());
        });

        return redirect()
            ->route('client.bookings.index')
            ->withMessage(__('page.bookings.flash.updated', ['booking' => $booking->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $slug = $booking->slug;

        client()->run(function () use ($booking) {
            $booking->delete();
        });

        return redirect()
            ->route('client.bookings.index')
            ->withMessage(__('page.bookings.flash.deleted', ['booking' => $slug]));
    }

    protected function getBookedDatesAndTimes($booking = null)
    {
        $bookings = ($booking) ? Booking::where('id', '!=', $booking->id)->get() : Booking::all();
        $booked = [];

        foreach($bookings->pluck('start_date')->all() as $datetime) {
            $booked[] = $datetime->toDateTimeString();
        };

        foreach($bookings->pluck('end_date')->all() as $datetime) {
            $booked[] = $datetime->toDateTimeString();
        };

        return $booked;
    }
}
