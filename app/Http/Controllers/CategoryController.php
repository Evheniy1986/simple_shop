<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

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
    public function store(CategoryRequest $request)
    {
        $categories =$request->validated();

        if ($request->hasFile('image')) {

           $imagePath = self::resizeImage($request);

            $categories['image'] = $imagePath;

        }

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
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            if (isset($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $imgPath = self::resizeImage($request);

            $data['image'] = $imgPath;

        }

        $data['code'] = Str::slug($data['title']);

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

    private function resizeImage($value)
    {
        $image = $value->file('image');

        $imgName = $image->hashName();

        $imagePath = $value->file('image')->store('/categories', 'public');


        $path = storage_path('app/public/categories/' . $imgName);

         Image::read($image)->resize(100, 100)->save($path);

        return $imagePath;
    }
}
