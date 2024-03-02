<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetController extends Controller
{
    public function reset()
    {
        Artisan::call('migrate:fresh --seed');

        foreach (['public/categories', 'public/products'] as $folder) {

            if (is_dir(storage_path($folder))) {
                Storage::deleteDirectory($folder);
            }
            Storage::makeDirectory($folder);
            $path = explode('/', $folder);
            $files = Storage::disk('reset')->files($path[1]);
            foreach ($files as $file) {
                Storage::disk('public')->put($file, Storage::disk('reset')->get($file));
            }
        }

        session()->flush();
        session()->flash('success', 'Проэкт был сброшен до начального сосстояния');
        return redirect()->route('index');
    }
}
