<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'category_id',
        'description',
        'description_en',
        'image',
        'weight',
        'old_price',
        'price',
        'is_new',
        'is_hit',
    ];

    protected $casts = [
        'old_price' => 'decimal:2',
        'price' => 'decimal:2',
        'is_hit' => 'boolean',
        'is_new' => 'boolean',
        'category_id' => 'integer',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function imageUrl()
    {
        return Storage::url($this->image);
    }



}
