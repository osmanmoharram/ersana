<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NewBookingRequest;
use App\Http\Requests\Api\UpdateBookingRequest;
use App\Models\Client\Booking;
use App\Models\Client\Customer;
use App\Models\Client\Hall;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewBookingRequest $request)
    {
        $data = $request->except(['name', 'email', 'phone']);

        if ($customer = Customer::where('email', $request->email)->first()) {
            $data['customer_id'] = $customer->id;
        } else {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'hall_id' => request('hall')
            ]);

            $data['customer_id'] = $customer->id;
        }

        Booking::create($data);

        return response()->json(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return response()->json(['booking' => $booking], 200);
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
        $booking->customer->update($request->only(['name', 'email', 'phone']));

        $booking->update($request->except(['name', 'email', 'phone']));

        return response()->json(200);
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
