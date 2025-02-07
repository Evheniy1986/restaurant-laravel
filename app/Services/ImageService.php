<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function processAndStore($file, $folder, $width = 800, $height = 800)
    {
        $fileName = uniqid() . '.webp';

        $path = "$folder/$fileName";

        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder);
        }

        Image::read($file)->cover($width, $height)->toWebp()->save(public_path('storage/'. $path));

        return $path;
    }

}
