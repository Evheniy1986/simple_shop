<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, ImageAction $imageAction)
    {
        $categories =$request->validated();

            $categories['image'] = $imageAction->resizeImage('categories', $request->file('image'));

        Category::query()->create($categories);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category, ImageAction $imageAction)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $imageAction->updateImage($category,'image', $request->file('image'), 'categories');;
        }

        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (isset($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }


}
