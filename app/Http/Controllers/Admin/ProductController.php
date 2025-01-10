<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::with('brands')->get();

        return view('admin.product.create', compact('categories'));
    }


    public function store(StoreRequest $request, ImageAction $imageAction)
    {
        $data = $request->validated();

        $data['preview_image'] = $imageAction->resizeImage('product_preview', $request->file('preview_image'));

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            $imageAction->processImages($request->file('images'), $product);
        }

        return redirect()->route('admin.products.index');
    }


    public function show(Product $product)
    {
        $product->load('optionValues.option');
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = $product->category ? $product->category->brands : [];
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }


    public function update(UpdateRequest $request, Product $product, ImageAction $imageAction)
    {
        $data = $request->validated();

        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = $imageAction->updateImage($product, 'preview_image', $request->file('preview_image'), 'product_preview');
        }

        $product->update($data);

        if ($request->has('delete_images')) {

            $this->deleteImages($request->delete_images, $product);
        }

        if ($request->hasFile('images')) {
            $imageAction->processImages($request->file('images'), $product);
        }

        return redirect()->route('admin.products.index')->with('success', 'Продукт успешно обновлен.');
    }


    protected function deleteImages(array $imageIds, Product $product)
    {
        foreach ($imageIds as $imageId) {
            $image = $product->images()->find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }
    }


    public function destroy(Product $product)
    {
        if (isset($product->preview_image)) {
            Storage::disk('public')->delete($product->preview_image);
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
