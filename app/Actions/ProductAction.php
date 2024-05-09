<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProductAction
{
//   private $product;
//
//   public function __construct($product)
//   {
//       $this->product = $product;
//
//   }

    public function ProductStore($data)
    {
        if (!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product = Product::query()->create($data);

        if (!empty($product->preview_image)) {
            $path = explode('/', $product->preview_image)[1];

            $image = Image::read(public_path('storage/'.$product->preview_image));

            $originalWidth = $image->width();
            $originalHeight = $image->height();

//            $cropWidth = 70;
//            $cropHeight = 70;
//            $cropX = max(0, ($originalWidth - $cropWidth) / 2);
//            $cropY = max(0, ($originalHeight - $cropHeight) / 2);
//
//            $image->crop($cropWidth, $cropHeight, $cropX, $cropY);
            $image->resize(70, 70);
            $image->save(public_path('storage/crop/'.$path));
        }

    }

    public static function getProduct()
    {
        return new ProductAction() ;
    }

    public function productUpdate($data, $product)
    {
        if (!empty($data['preview_image'])) {
            Storage::disk('public')->delete( $product->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product->update($data);

    }
}
