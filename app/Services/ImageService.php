<?php

namespace App\Services;

use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function processAndStore($file, $folder, $width = 800, $height = 800)
    {
        $fileName = uniqid() . '.webp';

        $path = "$folder/$fileName";

        Image::read($file)->resize($width, $height)->toWebp()->save(public_path('storage/'. $path));

        return $path;
    }

}
