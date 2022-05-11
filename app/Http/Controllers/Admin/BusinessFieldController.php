<?php

namespace App\Http\Controllers;

use App\Models\BusinessField;
use Illuminate\Http\Request;

class BusinessFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_fields = BusinessField::latest()->paginate(30);

        return view('admin.business-fields.index', compact('business_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessField $businessField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessField $businessField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessField $businessField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessField $businessField)
    {
        //
    }
}
