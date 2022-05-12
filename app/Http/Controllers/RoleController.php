<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(30);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($client_id = $request->user()->client_id) {
            $data['client_id'] = $client_id;
        }

        Role::create($data);

        return redirect()
            ->route('roles.index')
            ->withMessage(__('page.roles.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($client_id = $request->user()->client_id) {
            $data['client_id'] = $client_id;
        }

        $role->update(['name' => $request->name]);

        return redirect()
            ->route('roles.index')
            ->withMessage(__('page.roles.flash.updated', ['role' => $role->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $name = $role->name;

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->withMessage(__('page.roles.flash.deleted', ['role' => $name]));
    }
}
