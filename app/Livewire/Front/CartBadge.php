<?php

namespace App\Livewire\Front;

use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

class CartBadge extends Component
{
    public $count;

    public function mount(CartService $cartService)
    {
        $this->updateCount($cartService);
    }

    #[On(['cartUpdated', 'cartCreate'])]
    public function updateCount(CartService $cartService)
    {
        $this->count = $cartService->getTotalQuantity();
    }

    public function render()
    {
        return view('livewire.front.cart-badge');
    }
}
