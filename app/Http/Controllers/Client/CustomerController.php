<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\{NewCustomerRequest, UpdateCustomerRequest};
use App\Models\Client\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = client()->run(function () {
            return Customer::latest()->paginate(30);
        });

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
        client()->run(function () use ($request) {
            Customer::create($request->validated());
        });

        return redirect()->route('client.bookings.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
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
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        client()->run(function () use ($request, $customer) {
            $customer->update($request->validated());
        });

        return redirect()
            ->route('client.customers.index')
            ->withMessage(__('page.customers.flash.updated', ['customer' => $customer->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $name = $customer->name;

        client()->run(function () use ($customer) {
            $customer->delete();
        });

        return back()->withMessage(__('page.customers.flash.deleted', ['customer' => $name]));
    }
}
