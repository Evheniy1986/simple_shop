<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
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

    public function product($product)
    {
        return view('product', compact('product'));
    }
}
