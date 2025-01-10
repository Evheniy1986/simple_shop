<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionProduct\PropertyProductRequest;
use App\Http\Requests\OptionProduct\StoreRequest;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use Illuminate\Http\Request;

class OptionProductController extends Controller
{

    public function create(Product $product)
    {
        $options = Option::all();
        return view('admin.option_product.create', compact('options', 'product'));
    }


    public function store(StoreRequest $request, Product $product)
    {
      $product->optionValues()->syncWithoutDetaching($request->validated()['option_values']);
      return redirect()->route('admin.products.show', $product);
    }



    public function edit(Product $product)
    {
        $options = Option::with('values')->get();
        return view('admin.option_product.edit', compact('options', 'product'));
    }


    public function update(StoreRequest $request, Product $product)
    {
        $product->optionValues()->sync($request->validated()['option_values']);
        return redirect()->route('admin.products.show', $product);
    }


    public function destroy(Product $product)
    {
        $product->optionValues()->detach();
        return redirect()->route('admin.products.show', $product);
    }
}
