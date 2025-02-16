<div>
    <div class="product-card">
        <div class="product-card-offer">
            <div
                class="offer-hit badge text-bg-danger">{{ $meal->is_hit ? 'Топ продаж' : '' }}</div>
            <div class="offer-new badge text-bg-warning">{{ $meal->is_new ? 'Новинка' : '' }}</div>
        </div>
        <div class="product-thumb">
            <a class="no-underline" href="#"><img
                    src="{{ $meal->imageUrl() }}"
                    alt="{{ $meal->name }}"></a>
        </div>
        <div class="product-details w-100">
            <div class="in-stock">
                <span class="small">{{ $meal->weight }} г</span>
            </div>
            <h4>
                <a class="no-underline" href="#">{{ $meal->name }}</a>
            </h4>
            <p class="product-excerpt">{{ $meal->description }}</p>

            <div
                class="mt-2 product-bottom-details d-flex justify-content-between align-items-center">
                <div class="product-price mb-2">
                    <small class="d-block text-start">{{ $meal->old_price }}</small>
                    {{ $meal->price }} грн
                </div>

                <div class="product-links">
                    <button wire:click="addToCart({{ $meal->id }})" class="btn-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" class="cart-btn">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
