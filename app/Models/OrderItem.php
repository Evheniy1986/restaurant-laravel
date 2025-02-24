<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public static function storeMany(int $orderId,array $cart)
    {
        foreach ($cart as $id => $item) {
            self::create([
                'order_id' => $orderId,
                'menu_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    }
}
