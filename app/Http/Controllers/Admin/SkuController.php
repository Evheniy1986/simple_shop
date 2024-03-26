<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkuRequest;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $skus = $product->skus()->paginate(10);
        return view('auth.skus.index', compact('product', 'skus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('auth.skus.form', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkuRequest $request, Product $product)
    {
        $data = $request->all();
        $data['product_id'] = $request->product->id;
        $sku = Sku::query()->create($data);
        $sku->propertyOptions()->sync($request->property_id);
        return to_route('skus.index', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Sku $sku)
    {
        return view('auth.skus.show', compact('product', 'sku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Sku $sku)
    {
        return view('auth.skus.form', compact('product', 'sku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkuRequest $request, Product $product, Sku $sku)
    {
        $data = $request->all();
        $data['product_id'] = $request->product->id;
        $sku->update($data);
        $sku->propertyOptions()->sync($request->property_id);
        return to_route('skus.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Product  $product
     * @param  Sku  $sku
     */
    public function destroy(Product $product, Sku $sku)
    {
        $sku->delete();
        return to_route('skus.index', $product);
    }
}
