<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::get();
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

    public function product($category, $code= null)
    {
         $product = Product::query()->where('code', $code)->first();
        return view('product', compact('product'));
    }


}
