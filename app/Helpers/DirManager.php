<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class DirManager
{
    public function copyFiles($fromPath, $toPath)
    {
        if (!File::exists($toPath)) {
            File::makeDirectory($toPath, 0755, true, true);
        }

        $files = File::files($fromPath);
        $fileName = [];
        foreach ($files as $file) {
            $fileName[] = $file->getFilename();
            File::copy($fromPath . '/' . $file->getFilename(), $toPath . '/' . $file->getFilename());
        }
        return $fileName;
    }
}
