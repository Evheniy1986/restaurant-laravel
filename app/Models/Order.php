<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'delivery_type',
        'payment_method',
        'delivery_time_type',
        'delivery_date',
        'delivery_time',
        'comment',
        'total_price',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasOne(Addres::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
