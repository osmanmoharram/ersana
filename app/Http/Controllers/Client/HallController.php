<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewHallRequest;
use App\Http\Requests\Client\UpdateHallRequest;
use App\Models\Client\BookingTime;
use App\Models\Client\Hall;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::where('client_id', request()->user()->client_id)->get();

        return view('client.halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.halls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewHallRequest $request)
    {
        $data = $request->except('bookingTimes');

        $data['client_id'] = $request->user()->client_id;

        $hall = Hall::create($data);

        foreach ($request->bookingTimes as $time) {
            BookingTime::create([
                'period' => $time['period'],
                'from' => $time['from'],
                'to' => $time['to'],
                'hall_id' => $hall->id
            ]);
        }

        return redirect()
            ->route('halls.index')
            ->withMessage(__('page.halls.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall)
    {
        return view('client.halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->except('bookingTimes'));

        foreach ($hall->bookingTimes as $time) {
            $time->delete();
        }

        foreach ($request->bookingTimes as $time) {
            BookingTime::create([
                'period' => $time['period'],
                'from' => $time['from'],
                'to' => $time['to'],
                'hall_id' => $hall->id
            ]);
        }

        return redirect()
            ->route('client.halls.index')
            ->withMessage(__('page.halls.flash.updated', ['hall' => $hall->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
        return redirect()->route('client.halls.index');
    }
}
