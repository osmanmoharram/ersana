<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Client\BookingTime;
use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate(['client' => 'exists:clients,id']);

        $halls = Hall::where('client_id', $request->client)->get();

        return response()->json(['halls' => $halls], 200);
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
    public function store()
    {
        $data = $request->except('bookingTimes');

        $data['client_id'] = $request->user()->client_id;

        $hall = Hall::create($data);

        foreach ($request->bookingTimes as $time) {
            BookingTime::create([
                'period' => $time['period'],
                'from' => $time['from'],
                'to' => $time['to'],
                'price' => $time['price'],
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
                'price' => $time['price'],
                'hall_id' => $hall->id
            ]);
        }

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
        return redirect()->route('client.halls.index');
    }
}
