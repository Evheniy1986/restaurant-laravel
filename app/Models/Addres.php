<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addres extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'street',
        'house_number',
        'entrance',
        'floor',
        'apartment',
        'intercom'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
