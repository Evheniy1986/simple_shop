<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('auth.products.form', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if (!empty($request->file('image'))) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }
        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if (isset($data[$fieldName])) {
                $data[$fieldName] = 1;
            }
        }

        Product::query()->create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('auth.products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        if (!empty($request->file('image'))) {

            if (!empty($product->image) && file_exists(public_path('storage/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if (isset($data[$fieldName])) {
                $data[$fieldName] = 1;
            } else {
                $data[$fieldName] = 0;
            }
        }
        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
