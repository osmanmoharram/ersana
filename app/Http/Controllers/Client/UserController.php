<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewUserRequest;
use App\Http\Requests\Client\UpdateUserRequest;
use App\Models\Client\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = client()->run(function () {
            return User::where('id', '!=', auth()->id())->latest()->paginate(30);
        });

        return view('client.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = client()->run(function () {
            return DB::table('roles')->get();
        });

        return view('client.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        $user = client()->run(function () use ($request) {
            return User::create($request->validated());
        });

        return redirect()
            ->route('client.users.index')
            ->withMessage(__('page.users.flash.created', ['name' => $user->name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = client()->run(function () {
            return DB::table('roles')->get();
        });

        return view('client.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        client()->run(function () use ($request, $user){
            $user->update($request->validated());
        });

        return redirect()
            ->route('client.users.index')
            ->withMessage(__('page.users.flash.updated', ['user' => $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $username = $user->name;

        client()->run(function () use ($user){
            $user->delete();
        });

        return back()->withMessage(__('page.users.flash.deleted', ['user' => $username]));
    }
}
