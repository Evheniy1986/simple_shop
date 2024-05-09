<?php

namespace App\Http\Controllers;

//use App\Actions\productAction;
use App\Actions\ProductAction;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Decoders\FilePathImageDecoder;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Laravel\Facades\Image;

//use Image;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @var Image $img
     */
    public function store(StoreRequest $request)
    {


        $data = $request->validated();
        ProductAction::getProduct()->ProductStore($data);
//        if (!empty($data['preview_image'])) {
//            $extension = $request->file('preview_image')->extension();
//            $imagePath = $data['preview_image']->store('images', 'public');
//            $data['preview_image'] = $imagePath;
//        }
//
//        if (isset($request->tags)) {
//            $tagIds = $data['tags'];
//            unset($data['tags']);
//        }
//
//        if (isset($request->colors)) {
//            $colorIds = $data['colors'];
//            unset($data['colors']);
//        }
//
//        $product = Product::query()->create($data);
//        if (!empty($tagIds)) {
//            $product->tags()->attach($tagIds);
//        }
//        if (!empty($colorIds)) {
//            $product->colors()->attach($colorIds);
//        }
//
//        if (!empty($product->preview_image)) {
//            $path = explode('/', $product->preview_image)[1];
//
//            $image = Image::read(public_path('storage/'.$product->preview_image));
//
//            $originalWidth = $image->width();
//            $originalHeight = $image->height();
//
////            $cropWidth = 70;
////            $cropHeight = 70;
////            $cropX = max(0, ($originalWidth - $cropWidth) / 2);
////            $cropY = max(0, ($originalHeight - $cropHeight) / 2);
////
////            $image->crop($cropWidth, $cropHeight, $cropX, $cropY);
//            $image->resize(70, 70);
//            $image->save(public_path('storage/crop/'.$path));
//        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {


        $data = $request->validated();
        ProductAction::getProduct()->productUpdate($data, $product);
//        if (!empty($data['preview_image'])) {
//            Storage::disk('public')->delete( $product->preview_image);
//            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//        }
//
//        if (isset($request->tags)) {
//            $tagIds = $data['tags'];
//            unset($data['tags']);
//        }
//
//        if (isset($request->colors)) {
//            $colorIds = $data['colors'];
//            unset($data['colors']);
//        }
//
//        $product->update($data);
//
//        if (!empty($tagIds)) {
//            $product->tags()->sync($tagIds);
//        } else {
//            $product->tags()->detach();
//        }
//
//        if (isset($colorIds)) {
//            $product->colors()->sync($colorIds);
//        } else {
//            $product->colors()->detach();
//        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->preview_image);
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
