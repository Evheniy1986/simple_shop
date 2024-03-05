<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->all();
        unset($data['image']);
        if ($request->has('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }

//        if (!empty($request->file('image'))) {
//
//        }

        Category::query()->create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $data = $request->all();
        unset($data['image']);
        if (!empty($request->file('image'))) {
            if (!empty($category->image) && file_exists(public_path('storage/'. $category->image))) {
                unlink(storage_path('app/public/'.$category->image));
            }
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }
        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
