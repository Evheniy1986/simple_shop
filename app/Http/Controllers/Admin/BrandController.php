<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.brand.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $categoryIds = $data['category_id'];
        unset($data['category_id']);

        $brand = Brand::create($data);
        $brand->categories()->attach($categoryIds);

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $categories = Category::all();
        return view('admin.brand.edit', compact('brand', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        $data = $request->validated();

        $categoryIds = $data['category_id'] ?? [];
        unset($data['category_id']);

        $brand->update($data);

        $brand->categories()->sync($categoryIds);

        return redirect()->route('admin.brands.index')->with('success', 'Бренд успешно обновлен.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Бренд успешно удален.');
    }

    public function getBrand($categoryId)
    {
        $category = Category::find($categoryId);
        $brands = $category->brands;
        if ($brands) {
            return response()->json($brands);
        }
        return response()->json(['Error'], 404);
    }
}
