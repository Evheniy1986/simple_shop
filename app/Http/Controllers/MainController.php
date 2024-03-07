<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index(ProductFilterRequest $request)
    {
        $productQuery = Product::with('category');
        if ($request->filled('price_from')) {
            $productQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productQuery->where('price', '<=', $request->price_to);
        }
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productQuery->$field();
            }
        }

        $products = $productQuery->paginate(6)->withQueryString();

        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::query()->get();
        return view('categories', compact('categories'));
    }

    public function category($slug)
    {
        $category = Category::query()->where('code', $slug)->first();
        return view('category', compact('category'));
    }

    public function product($category, $code)
    {

         $product = Product::query()->where('code', $code)->first();
        if (!$product) {
            if (auth()->check() && auth()->user()->isAdmin()) {
                $product = Product::withTrashed()->where('code', $code)->first();
            } else {
                return redirect()->route('index');
            }
        }
        return view('product', compact('product'));
    }


}
