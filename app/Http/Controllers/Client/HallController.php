<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewHallRequest;
use App\Http\Requests\Client\UpdateHallRequest;
use App\Models\Client\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::where('client_id', request()->user()->client_id);

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
        client()->run(function () use ($request) {
            Hall::create($request->validated());
        });

        return redirect()->route('client.halls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        Session::put('current_hall', $hall);

        return view('client.dashboard');
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
        client()->run(function () use ($request, $hall) {
            $hall->update($request->validated());
        });

        return redirect()->route('client.halls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
        client()->run(function () use ($hall) {
            $hall->delete();
        });

        return redirect()->route('client.halls.index');
    }
}
