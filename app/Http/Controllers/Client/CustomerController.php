<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\{NewCustomerRequest, UpdateCustomerRequest};
use App\Models\Client\Customer;
use App\Models\Hall;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('hall_id', session('hall')->id)->latest()->paginate(30);

        return view('client.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCustomerRequest $request)
    {
        Customer::create($request->validated() + ['hall_id' => session('hall')->id]);

        return redirect()
            ->route('halls.bookings.create', session('hall')->id)
            ->withMessage(__('page.customers.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall, Customer $customer)
    {
        return view('client.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Hall $hall, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect()
            ->route('halls.customers.index', session('hall')->id)
            ->withMessage(__('page.customers.flash.updated', ['customer' => $customer->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall, Customer $customer)
    {
        $name = $customer->name;

        $customer->delete();

        return back()->withMessage(__('page.customers.flash.deleted', ['customer' => $name]));
    }
}
