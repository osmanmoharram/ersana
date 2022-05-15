<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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
        $roles = request()->user()->isClient()
            ? Role::where('client_id', request()->user()->client_id)
            : Role::where('client_id', null);

        return view('roles.index', ['roles' => $roles->latest()->paginate(30)]);
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = request()->user()->isClient()
            ? Permission::where('type', 'client')->orWhere('type', 'both')
            : Permission::where('type', 'owner')->orWhere('type', 'both');

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions->get()
        ]);
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
        $permissions = $request->validate([
            'permissions' => ['required', 'array'],
            'permissions.*' => ['exists:permissions,id']
        ]);

        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->withMessage(__('page.roles.flash.updated', ['role' => __('roles.' . $role->name)]));
    }
}
