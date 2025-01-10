<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionValue\OptionValueRequest;
use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Request;

class OptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $optionValues = OptionValue::with('option')->get();
        return view('admin.option_value.index', compact('optionValues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = Option::all();
        return view('admin.option_value.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionValueRequest $request)
    {

        OptionValue::create($request->validated());

        return redirect()->route('admin.option-values.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OptionValue $optionValue)
    {
        return view('admin.option_value.show', compact('optionValue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OptionValue $optionValue)
    {
        $options = Option::all();
        return view('admin.option_value.edit', compact('options', 'optionValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionValueRequest $request, OptionValue $optionValue)
    {
        $optionValue->update($request->validated());

        return redirect()->route('admin.option-values.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OptionValue $optionValue)
    {
        $optionValue->delete();

        return redirect()->route('admin.option-values.index');
    }
}
