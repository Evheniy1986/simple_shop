<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyProduct\PropertyProductRequest;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyProductController extends Controller
{

    public function create(Product $product)
    {
        $properties = Property::all();
        return view('admin.property_product.create', compact('properties', 'product'));
    }


    public function store(PropertyProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $propertyIds = $data['property_id'];
        $values = $data['value'];

        $syncData = [];
        foreach ($propertyIds as $index => $propertyId) {
            $syncData[$propertyId] = ['value' => $values[$index]];
        }

        $product->properties()->syncWithoutDetaching($syncData);

        return redirect()->route('admin.products.show', $product)
            ->with('success', 'Свойства успешно добавлены.');
    }



    public function edit(Product $product)
    {
        $properties = Property::with('products')->get();
        return view('admin.property_product.edit', compact('properties', 'product'));
    }


    public function update(PropertyProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $propertyIds = $data['property_id'];
        $values = $data['value'];

        $syncData = [];
        foreach ($propertyIds as $index => $propertyId) {
            $syncData[$propertyId] = ['value' => $values[$index]];
        }

        $product->properties()->sync($syncData);

        return redirect()->route('admin.products.show', $product)
            ->with('success', 'Свойства успешно обновлены.');
    }


    public function destroy(Product $product)
    {
        $product->properties()->detach();
        return redirect()->route('admin.products.show', $product);
    }
}
