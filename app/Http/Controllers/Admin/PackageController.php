<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Admin\Feature;
use App\Models\Admin\FeaturePackage;
use App\Models\Admin\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.packages.index', ['packages' => Package::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create', ['features' => Feature::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewPackageRequest $request)
    {
        $package = Package::create($request->except(['features']));

        foreach ($request->features as $feature_id) {
            FeaturePackage::create([
                'feature_id' => $feature_id,
                'package_id' => $package->id
            ]);
        }

        return redirect()
            ->route('packages.index')
            ->withMessage(__('page.packages.flash.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $features = Feature::all();
        return view('admin.packages.edit', compact('package', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->except(['features']));

        // Delete old package feature
        $old_features = FeaturePackage::where('package_id', $package->id)->get();
        foreach ($old_features as $feature) {
            $feature->delete();
        }

        // insert new package features
        foreach ($request->features as $feature_id) {
            FeaturePackage::create([
                'feature_id' => $feature_id,
                'package_id' => $package->id
            ]);
        }

        return redirect()
            ->route('packages.index')
            ->withMessage(__('page.packages.flash.updated', ['package' => $package->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $name = $package->name;

        $package->delete();

        return back()->withMessage(__('page.packages.flash.deleted', ['package' => $name]));
    }
}
