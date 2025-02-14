<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'description',
        'description_en',
        'image',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getImage()
    {
        return Storage::url($this->image);
    }
}
