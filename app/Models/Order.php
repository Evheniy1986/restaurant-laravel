<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'delivery_type',
        'payment_method',
        'delivery_time_type',
        'change_with',
        'delivery_date',
        'delivery_time',
        'comment',
        'total_price',
        'status',
        'payment_status'
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'delivery_time' => 'datetime:H:i:s',
        'status' => OrderStatus::class,
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
