<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Option;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();
        return view('admin.option.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.option.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request)
    {
        Option::create($request->validated());
        return redirect()->route('admin.options.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        return view('admin.option.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.option.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.options.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.options.index');
    }
}
