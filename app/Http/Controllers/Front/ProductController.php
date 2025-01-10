<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('front.product.show',compact('product'));
    }

}
