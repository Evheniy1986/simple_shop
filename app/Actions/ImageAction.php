<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class ImageAction
{


    public function resizeImage($dir = '', $image = null)
    {
        if (!$image) {
            return 'default_image/no_image.jpg';
        }
        $name = $image->hashName();

        $path = Storage::disk('public')->put('crop', $image);

        $resizeImage = Image::read(public_path('storage/' . $path));

        $resizeImage->resize(300, 300);

        $previewPath = "{$dir}/{$name}";

        if (!Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
        }
        $resizeImage->save(public_path('storage/' . $previewPath));

        Storage::disk('public')->delete($path);

        return $previewPath;
    }

    public function processImages($images, $model, $dir = 'products')
    {
        foreach ($images as $image) {
            $path = $image->store($dir, 'public');

            $model->images()->create([
                'image_path' => $path,
            ]);
        }
    }

    public function updateImage($model, $attribute, $newImage, $dir)
    {
        if (isset($model->$attribute) && $model->$attribute !== 'default_image/no_image.jpg') {
            Storage::disk('public')->delete($model->$attribute);
        }

        return $this->resizeImage($dir, $newImage);
    }



}
