<?php

namespace App\Livewire\Front;

use App\Services\CartService;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Product extends Component
{
    public $meal;

    public function addToCart($mealId, CartService $cartService)
    {
        $cartService->add($mealId);
        Toaster::success('Товар добавлен в корзину!');
        $this->dispatch('cartCreate');
    }

    public function render()
    {
        return view('livewire.front.product');
    }
}
