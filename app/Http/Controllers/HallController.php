<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Admin\Client;
use App\Models\Client\BookingTime;
use App\Models\Hall;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->user()->isClient()) {
            $client = Client::findOrFail(request()->user()->client_id);

            $halls = $client->halls;

            return view('halls.select', compact('halls'));
        } else {
            $halls = Hall::latest()->paginate(30);

            return view('halls.index', compact('halls'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();

        return view('halls.create', compact('clients'));
    }

    public function store(NewHallRequest $request)
    {
        Hall::create($request->validated());

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
        return view('halls.edit', compact('hall'));
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
        $hall->update($request->validated());

        // foreach ($hall->bookingTimes as $time) {
        //     $time->delete();
        // }

        // foreach ($request->bookingTimes as $time) {
        //     BookingTime::create([
        //         'period' => $time['period'],
        //         'from' => $time['from'],
        //         'to' => $time['to'],
        //         'price' => $time['price'],
        //         'hall_id' => $hall->id
        //     ]);
        // }

        return redirect()
            ->route('halls.index')
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
        return redirect()->route('halls.index');
    }
}
