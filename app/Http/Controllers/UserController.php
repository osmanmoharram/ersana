<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->user()->isClient()) {
            $users = User::where('hall_id', session('hall')->id)
                ->latest()
                ->paginate(30);
        } else {
            $q = User::where('hall_id', null)->whereDoesntHave('roles');

            if (request()->user()->hasRole('super_admin')) {
                $users = $q->orWhereHas('roles', function ($query) {
                    $query->where('name', '!=', 'super_admin');
                })->latest()->paginate(30);
            } else {
                $users = $q->orWhereHas('roles', function ($query) {
                    $query
                        ->where('name', '!=', 'super_admin')
                        ->orWhere('name', '!=', 'admin');
                })->latest()->paginate(30);
            }
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = request()->user()->isClient()
            ? Permission::where('type', 'client')->orWhere('type', 'both')->get()
            : Permission::where('type', 'owner')->orWhere('type', 'both')->get();

        return view('users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        $data = $request->except('permissions');

        if ($request->user()->isClient()) {
            $data['hall_id'] = session('hall')->id;
            $data['client_id'] = $request->user()->client_id;
        }

        $user = User::create($data);

        $user->assginRole($request->role);

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        return redirect()
            ->route('users.index')
            ->withMessage(__('page.users.flash.created', ['name' => $user->name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = request()->user()->isClient()
            ? Permission::where('type', 'client')->orWhere('type', 'both')->get()
            : Permission::where('type', 'owner')->orWhere('type', 'both')->get();

        return view('users.edit', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->except('permissions');

        if($request->user()->isClient()) {
            $data['client_id'] = $request->user()->client_id;
        }

        $user->update($data);

        $user->syncPermissions($request->permissions);

        return redirect()
            ->route('users.index')
            ->withMessage(__('page.users.flash.updated', ['user' => $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $username = $user->name;

        $user->delete();

        return back()->withMessage(__('page.users.flash.deleted', ['user' => $username]));
    }
}
