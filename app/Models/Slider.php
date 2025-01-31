<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
