<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewBookingTimeRequest;
use App\Http\Requests\Client\UpdateBookingTimeRequest;
use App\Models\Client\Booking;
use App\Models\Client\BookingTime;
use App\Models\Hall;
use Illuminate\Http\Request;

class BookingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingTimes = BookingTime::where('hall_id', session('hall')->id)->latest()->paginate(30);

        return view('client.booking-times.index', compact('bookingTimes'));
        // $bookings_bookingTimes = [];

        // $hall_bookingTimes = BookingTime::where('hall_id', session('hall')->id)
        //                         ->where('period', request('period'))->get();


        // $bookings = Booking::where('date', request('date')[0])
        //                 ->whereHas('bookingTime', function ($query) {
        //                     $query
        //                         ->where('hall_id', session('hall')->id)
        //                         ->where('period', '=', request('period'));
        //                 })->get();

        // if ($bookings) {
        //     foreach ($bookings as $booking) {
        //         $bookings_bookingTimes[] = $booking->bookingTime;
        //     }
        // }

        // $available = $hall_bookingTimes->filter(function ($value) use ($bookings_bookingTimes) {
        //     return ! in_array($value, $bookings_bookingTimes);
        // });

        // return response()->json(['times' => $available->toArray()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.booking-times.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewBookingTimeRequest $request, Hall $hall)
    {
        BookingTime::create($request->validated() + ['hall_id' => $hall->id]);

        return redirect()->route('halls.booking-times.index', session('hall')->id)
            ->withMessage(__('page.bookingTimes.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall, BookingTime $bookingTime)
    {
        return view('client.booking-times.edit', compact('bookingTime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingTimeRequest $request, Hall $hall, BookingTime $bookingTime)
    {
        $bookingTime->update($request->validated());

        return redirect()->route('halls.booking-times.index', session('hall')->id)
            ->withMessage(__('page.bookingTimes.flash.updated', ['bookingTime' => $bookingTime->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall, BookingTime $bookingTime)
    {
        $id = $bookingTime->id;

        $bookingTime->delete();

        return redirect()->route('halls.booking-times.index', session('hall')->id)
            ->withMessage(__('page.bookingTimes.flash.deleted', ['bookingTime' => $id]));
    }
}
