<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::latest()->paginate(30);

        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $packages = Package::all();

        return view('admin.subscriptions.create', compact('clients', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client' => ['required', 'exists:clients,id'],
            'package' => ['required', 'exists:packages,id']
        ]);

        $subscription = Subscription::create([
            'client_id' => $request->client,
            'package_id' => $request->package
        ]);

        $subscription->update([
            'slug' => '#' . number_format($subscription->id, 5)
        ]);

        return redirect()
            ->route('subscriptions.index')
            ->withMessage(__('page.subscriptions.flash.created', ['subscription' => $subscription->slug]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        $clients = Client::all();
        $packages = Package::all();

        return view('admin.subscriptions.edit', compact('subscription', 'clients', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        if ($action = $request->action) {
            if ($action === 'activate') {
                $subscription->update(['status' => 'active']);
            } elseif ($action === 'suspend') {
                $subscription->update(['status' => 'suspended']);
            }
            return back();
        }

        $request->validate(['package' => ['required', 'exists:packages,id']]);

        $subscription->update(['package_id' => $request->package]);

        return redirect()
            ->route('subscriptions.index')
            ->withMessage(__('page.subscriptions.flash.updated', ['subscription' => $subscription->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $slug = $subscription->slug;

        $subscription->delete();

        return back()->withMessage(__('page.subscriptions.flash.deleted', ['subscription' => $slug]));
    }
}
