<?php

namespace App\Livewire\Front;

use App\Services\CartService;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total;
    public $quantity;

    public function mount(CartService $cartService)
    {
        $this->updateCart($cartService);
    }

    public function updateCart(CartService $cartService)
    {
        $this->cart = $cartService->getCart();
        $this->total = $cartService->getTotalPrice();
        $this->quantity = $cartService->getTotalQuantity();
        $this->dispatch('cartUpdated');
    }

    public function increase($id, CartService $cartService)
    {
        if (isset($this->cart[$id])) {
            $cartService->plus($id);
            $this->updateCart($cartService);
        }

    }

    public function decrease($id, CartService $cartService)
    {
        if (isset($this->cart[$id])) {
            $cartService->minus($id);
            $this->updateCart($cartService);
        }

    }

    public function delete($id, CartService $cartService)
    {
        $cartService->remove($id);
        $this->updateCart($cartService);

    }

    public function render()
    {
        return view('livewire.front.cart')
            ->extends('front.cart');
    }
}
