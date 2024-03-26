<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOptionRequest;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Property $property)
    {
        $propertyOptions = PropertyOption::query()->where('property_id', $property->id)->paginate(10);
        return view('auth.property_options.index', compact('propertyOptions', 'property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Property $property)
    {
        return view('auth.property_options.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyOptionRequest $request, Property $property)
    {
        $data = $request->all();
        $data['property_id'] = $request->property->id;
        PropertyOption::query()->create($data);
        return to_route('property-options.index', $property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.show', compact('propertyOption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.form', compact('property', 'propertyOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyOptionRequest $request,Property $property, PropertyOption $propertyOption)
    {

        $propertyOption->update($request->validated());
        return to_route('property-options.index', $property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property, PropertyOption $propertyOption)
    {
        $propertyOption->delete();
        return to_route('property-options.index', $property);
    }
}
