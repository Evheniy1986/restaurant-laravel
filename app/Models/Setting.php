<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{


    protected $fillable = [
        'key',
        'value',
        'value_en',
    ];
}
