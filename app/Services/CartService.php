<?php

namespace App\Services;

use App\Models\Menu;

class CartService
{
    const MINIMUM_QUANTITY = 1;
    protected $sessionKey = 'cart';

    public function getCart()
    {
        return session()->get($this->sessionKey, []);
    }

    public function add($mealId, $quantity = 1)
    {
        $cart = $this->getCart();

        if (isset($cart[$mealId])) {
            $cart[$mealId]['quantity'] += $quantity;
        } else {
            $meal = Menu::find($mealId);
            if (!$meal) return;

            $cart[$mealId] = [
                'name' => $meal->name,
                'price' => $meal->price,
                'quantity' => $quantity,
                'image' => $meal->image,
            ];
        }
        session()->put($this->sessionKey, $cart);
    }

    public function plus($mealId)
    {
        $cart = $this->getCart();
        if (isset($cart[$mealId])) {
            $cart[$mealId]['quantity'] += 1;
            session()->put($this->sessionKey, $cart);
        }
    }

    public function minus($mealId)
    {
        $cart = $this->getCart();
        if (isset($cart[$mealId])) {
            if ($cart[$mealId]['quantity'] > self::MINIMUM_QUANTITY) {
                $cart[$mealId]['quantity'] -= 1;
            } else {
                unset($cart[$mealId]);
            }
            session()->put($this->sessionKey, $cart);
        }
    }

    public function remove($mealId)
    {
        $cart = $this->getCart();
        unset($cart[$mealId]);
        session()->put($this->sessionKey, $cart);
    }

    public function clearCart()
    {
        session()->forget($this->sessionKey);
    }

    public function getTotalQuantity()
    {
        return array_sum(array_column($this->getCart(), 'quantity'));
    }

    public function getTotalPrice()
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $this->getCart()));
    }


}
