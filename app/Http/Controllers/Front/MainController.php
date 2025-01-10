<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {

        $products = Product::query()->with('category')->get();
        return view('front.index', compact('products'));
    }
}
