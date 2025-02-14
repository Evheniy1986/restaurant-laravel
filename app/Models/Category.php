<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'name_en',
        'slug'
    ];


    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function scopeWithRandomMenu($query)
    {
        return $query->whereHas('menus')->with(['menus' => function ($q) {
            $q->inRandomOrder()->take(4);
        }]);
    }

    public function scopeFindBySlug($query)
    {
        return $query->where('slug', $this->slug);
    }
}
