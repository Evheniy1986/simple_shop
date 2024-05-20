<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($categoryCode, Product $product)
    {
        return view('front.product.show',compact('product'));
    }

}
