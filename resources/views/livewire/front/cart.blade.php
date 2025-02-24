<section class="cart-section">
    <div class="container">
        <div class="row mt-1 mb-3">
            <div class="col-12">
                <a href="{{ route('main') }}" class="btn-main-page mb-1 no-underline">&larr; Назад</a>
            </div>
        </div>

        @if($cart && count($cart) > 0)
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="text-center mt-lg-3">Кошик</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @foreach($cart as $id => $item)
                        <div class="cart-item row align-items-center mb-1 gx-0">
                            <div class="cart-image col-6 col-sm-7 d-flex align-items-center mb-5 mb-sm-0">
                                <a href="#" class="d-flex align-items-center no-underline">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                         alt="{{ $item['name'] }}" class="img-fluid me-3">
                                    <span class="cart-product-name">{{ $item['name'] }}</span>
                                </a>
                            </div>
                            <div class="cart-price col-6 col-sm-2 text-center mb-5 mb-sm-0">
                                <span class="me-2">{{ $item['price'] * $item['quantity'] }} грн</span>
                            </div>
                            <div
                                class="col-12 col-sm-3 d-flex justify-content-between align-items-center flex-wrap">
                                <div
                                    class="quantity-controls d-flex align-items-center align-content-center mb-2 mb-sm-0 col-6 col-sm-5">
                                    <button wire:click="decrease({{ $id }})" class="decrease-btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <input readonly type="text" class="text-center quantity-input"
                                           value="{{ $item['quantity'] }}" min="1">
                                    <button wire:click="increase({{ $id }})" class="increase-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <button wire:click="delete({{ $id }})" class="btn-delete-product col-sm-2 col-6">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="cart-summary">
                        <div class="item-count mb-3">
                            <p class="mb-1">Количество товаров:</p>
                            <p class="fw-bold">{{ $quantity }} шт</p>
                        </div>
                        <div class="item-total">
                            <p class="mb-1">Общая сумма:</p>
                            <p class="fw-bold total-price">{{ $total }} грн</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('checkout') }}" class="no-underline btn-chekout d-block w-100 text-center">Оформить заказ</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <h3 class="text-muted">Корзина пуста</h3>
            </div>
        @endif


    </div>
</section>


