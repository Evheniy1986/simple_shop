<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('front.categories.index', compact('categories'));
    }

    public function show( $categoryCode)
    {
        $category = Category::with('products')->where('code', $categoryCode)->first();

        return view('front.categories.show', compact('category'));
    }
}
