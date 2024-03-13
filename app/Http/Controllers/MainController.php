<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subscribtion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscribtion::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with('success', 'Спасибо мы сообщим вам о поступлении товара');
    }


    public function changeLocale($locale)
    {
        $availableLocale = ['ru', 'en'];
        if (!in_array($locale, $availableLocale)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
