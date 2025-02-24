<section class="checkout-section">
    <div class="container">
        <div class="row row mt-1 mb-3">
            <div class="col-12">
                <a href="{{ route('cart') }}" class="btn-main-page mb-1 no-underline">&larr; Назад</a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="checkout-header">
                <h1 class="checkout-title text-center mt-3">Оформление заказа</h1>
            </div>
        </div>
        <div class="row checkout m-auto">
            <!-- Блок с товарами -->
            <div class="product-checkout-wrapper col-lg-5 col-12 order-lg-2 ms-lg-3">
                @foreach($cart as $item)
                    <div class="product-checkout-item ">
                        <div class="product-checkout-img">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                 alt="{{ $item['name'] }}" class="img-fluid">
                        </div>
                        <div class="product-checkout-title">
                            <p>{{ $item['name'] }} : <span>{{ $item['quantity'] }} шт</span></p>
                        </div>
                        <div class="product-checkout-price">
                            <p>{{ $item['price'] * $item['quantity'] }} грн</p>
                        </div>
                    </div>
                @endforeach

                <div class="product-total">
                    <p class="product-total-text">Всего:</p>
                    <p class="product-total-price">{{ $total }} грн</p>
                </div>
            </div>

            <form wire:submit="save" class="checkout-form col-lg-6 col-12 order-lg-1">
                <!-- Раздел доставки -->
                <div class="form-delivery row">
                    <h3 class="form-title">Доставка</h3>
                    <div class="form-check col-6">
                        <input class="form-check-input custom-check-input @error('delivery_type') is-invalid @enderror"
                               type="radio" id="deliveryCourier" wire:model.live="delivery_type" value="courier">
                        <label class="form-check-label custom-check-label" for="deliveryCourier">Доставка
                            курьером</label>
                    </div>
                    <div class="form-check col-6">
                        <input class="form-check-input custom-check-input @error('delivery_type') is-invalid @enderror"
                               type="radio" id="deliveryPickup" wire:model.live="delivery_type" value="pickup">
                        <label class="form-check-label custom-check-label"
                               for="deliveryPickup">Самовивіз</label>

                    </div>
                    @error('delivery_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Контактные данные -->
                <div class="form-contact row">
                    <h3 class="form-title">Контактні дані</h3>
                    <div class="col-sm-6">
                        <label for="customerName" class="form-label">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               wire:model.live="name" id="customerName"
                               placeholder="Ваше имя">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="customerPhone" class="form-label">Номер телефона</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+380</span>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                   wire:model.live="phone" id="inputPhone"
                                   placeholder="XXXXXXXXX" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if($delivery_type == 'courier')
                    <div class="form-address row">
                        <h3 class="form-title">Адресса</h3>
                        <div class="col-sm-4" x-data="{ showSuggestions: false }">
                            <label for="street-search" class="form-label">Введите улицу:</label>
                            <input id="street-search"
                                   wire:model.live.debounce.300="street"
                                   class="form-control"
                                   type="text"
                                   placeholder="Введите улицу"
                                   autocomplete="off"
                                   @focus="showSuggestions = true"
                                   @click.away="showSuggestions = false">

                            @if (!empty($suggestions))
                                <ul class="autocomplete-list" x-show="showSuggestions" x-transition>
                                    @foreach ($suggestions['items'] as $suggestion)
                                        <li class="list-group-item"
                                            wire:click="selectStreet('{{ $suggestion['title'] ?? '' }}')"
                                            @click="showSuggestions = false">
                                            {{ $suggestion['title'] ?? 'Нет данных' }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @error('street')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="houseNumber" class="form-label">Будинок</label>
                            <input id="houseNumber" type="text" wire:model.live="house_number" class="form-control"
                                   placeholder="№ дома">
                            @error('house_number')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="entrance" class="form-label">Підїзд</label>
                            <input id="entrance" type="text" wire:model="entrance" class="form-control"
                                   placeholder="№ подъезда">
                            @error('entrance')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="floor" class="form-label">Поверх</label>
                            <input id="floor" type="text" wire:model="floor" class="form-control" placeholder="№ этажа">
                            @error('floor')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="apartment" class="form-label">Квартира</label>
                            <input id="apartment" type="text" wire:model="apartment" class="form-control"
                                   placeholder="№ квартиры">
                            @error('apartment')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="intercom" class="form-label">Домофон</label>
                            <input id="intercom" type="text" wire:model="intercom" class="form-control"
                                   placeholder="Код домофона">
                            @error('intercom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Условия доставки -->
                    <div class="form-delivery-options row">
                        <h3 class="form-title">Умови доставки</h3>
                        <div class="form-check col-12">
                            <input class="form-check-input" wire:model.live="delivery_time_type" value="soon"
                                   type="radio" id="asSoonAsPossible">
                            <label class="form-check-label" for="asSoonAsPossible">Якомога швидше</label>
                            <span class="delivery-text">ми доставим в</span>
                            <span
                                class="delivery-time">{{ $delivery_time_type === 'soon' ? $calculated_time : '' }}</span>
                        </div>

                        <div class="form-check col-12">
                            <input class="form-check-input" wire:model.live="delivery_time_type" value="specific"
                                   type="radio" id="specificTime">
                            <label class="form-check-label" for="specificTime">До певного часу</label>
                            @error('delivery_time_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($delivery_time_type == 'specific')
                            <div class="col-sm-6">
                                <label for="inputDate" class="form-label">Дата:</label>
                                <input class="form-control" min="{{ now()->format('Y-m-d') }}"
                                       max="{{ now()->addDays(7)->format('Y-m-d')}}" type="date"
                                       wire:model.live="delivery_date"
                                       id="inputDate">
                                @error('delivery_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="inputTime" class="form-label">Час:</label>
                                <select id="inputTime" class="form-select" wire:model.live="delivery_time">
                                    <option value="">Выберите время</option>
                                    @foreach($timeOptions as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                    @endforeach
                                </select>
                                @error('delivery_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        @endif
                    </div>

                    <!-- Оплата -->
                    <div class="form-payment row">
                        <h3 class="form-title">Умови оплати</h3>
                        <div class="form-check col-12">
                            <input class="form-check-input" wire:model.live="payment_method" value="cash" type="radio"
                                   id="cashPayment">
                            <label class="form-check-label" for="cashPayment">Оплата готівкою</label>
                        </div>
                        @if($payment_method == 'cash')
                            <div class="col-12">
                                <input type="text" wire:model="change_with" class="form-control" placeholder="Решта з">
                            </div>
                        @endif

                        <div class="form-check col-12">
                            <input class="form-check-input" wire:model.live="payment_method" value="terminal"
                                   type="radio" id="terminalPayment">
                            <label class="form-check-label" for="terminalPayment">Через термінал</label>
                        </div>
                        <div class="form-check col-12">
                            <input class="form-check-input" wire:model.live="payment_method" value="online" type="radio"
                                   id="onlinePayment">
                            <label class="form-check-label" for="onlinePayment">Онлайн</label>
                            @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif
                <!-- Комментарий -->
                <div class="form-comments row">
                    <label for="orderComments" class="form-label">Коментарий</label>
                    <textarea wire:model="comment" class="form-control" id="orderComments" rows="2"
                              placeholder="Ваш комментарий"></textarea>
                </div>

                <!-- Кнопка отправки -->
                <div class="text-center mt-4 mb-5 row">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-success flex-grow-1">Заказать</button>
                        <div wire:loading class="spinner-border text-success ms-3" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>


