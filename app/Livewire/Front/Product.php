<?php

namespace App\Livewire\Front;

use App\Services\CartService;
use Livewire\Component;

class Product extends Component
{
    public $meal;

    public function addToCart($mealId, CartService $cartService)
    {
        $cartService->add($mealId);
        $this->dispatch('cartCreate');
    }

    public function render()
    {
        return view('livewire.front.product');
    }
}
