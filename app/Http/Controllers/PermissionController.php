<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate(30);
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
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

        Permission::create($data);

        return redirect()
            ->route('permissions.index')
            ->withMessage(__('page.permissions.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($client_id = $request->user()->client_id) {
            $data['client_id'] = $client_id;
        }

        $permission->update(['name' => $request->name]);

        return redirect()
            ->route('permissions.index')
            ->withMessage(__('page.permissions.flash.updated', ['permission' => $permission->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $name = $permission->name;

        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->withMessage(__('page.permissions.flash.deleted', ['permission' => $name]));
    }
}
