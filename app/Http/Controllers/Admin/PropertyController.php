<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proprty\PropertyRequest;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        Property::create($request->validated());
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('admin.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());
        return redirect()->route('admin.properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index');
    }
}
