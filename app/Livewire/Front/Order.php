<?php

namespace App\Livewire\Front;

use App\ApiServices\Liqpay;
use App\ApiServices\SearchStreetApi;
use App\Enums\OrderStatus;
use App\Models\Addres;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\CartService;
use App\Services\TimeSevice;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Order extends Component
{
    #[Validate('required|string|min:3|max:255')]
    public $name;

    #[Validate('required|in:courier,pickup')]
    public $delivery_type;

    #[Validate('required|numeric|min_digits:9')]
    public $phone;

    #[Validate('nullable|required_if:delivery_type,courier|string')]
    public $street;

    #[Validate('nullable|required_if:delivery_type,courier|numeric')]
    public $house_number;

    #[Validate('nullable|required_if:delivery_type,courier|in:soon,specific')]
    public $delivery_time_type;

    #[Validate('nullable|required_if:delivery_type,courier|in:cash,terminal,online')]
    public $payment_method;

    #[Validate('nullable|string|max:1000')]
    public $comment;

    #[Validate('nullable|required_if:delivery_time_type,specific|date')]
    public $delivery_date;

    #[Validate('nullable|required_if:delivery_time_type,specific|string')]
    public $delivery_time;

    public $entrance;
    public $floor;
    public $apartment;
    public $intercom;
    public $change_with;
    public $cart = [];
    public $total;

    public $timeOptions = [];
    public $calculated_time;
    public $suggestions = [];

    protected $deliveryTimeSevice;

    public function __construct()
    {
        $this->deliveryTimeSevice = new TimeSevice();
    }

    public function updatedStreet()
    {
        if (strlen($this->street) < 3) {
            $this->suggestions = [];
            return;
        }

        try {
            $this->suggestions = (new SearchStreetApi())->findStreet($this->street);
        } catch (\Exception $e) {
            $this->suggestions = [];
        }
    }

    public function selectStreet($street)
    {
        $this->street = $street;
        $this->suggestions = [];
    }

    public function updatedDeliveryTimeType($value)
    {
        if ($value === 'soon') {
            $this->calculated_time = $this->deliveryTimeSevice->calculateMinute();
            $this->delivery_time = $this->calculated_time;
        }
    }

    public function updatedDeliveryDate()
    {
        $this->timeOptions = $this->deliveryTimeSevice->generateTimeOptions($this->delivery_date);
    }


    public function mount(CartService $cartService)
    {
        $this->cart = $cartService->getCart();
        $this->total = $cartService->getTotalPrice();
        $this->delivery_date = Carbon::today()->format('Y-m-d');
        $this->timeOptions = $this->deliveryTimeSevice->generateTimeOptions($this->delivery_date);
    }


    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $order = \App\Models\Order::create([
                    'name' => $this->name,
                    'phone' => $this->phone,
                    'delivery_type' => $this->delivery_type,
                    'payment_method' => $this->payment_method,
                    'change_with' => $this->change_with,
                    'delivery_time_type' => $this->delivery_time_type,
                    'delivery_date' => $this->delivery_date,
                    'delivery_time' => $this->delivery_time,
                    'comment' => $this->comment,
                    'total_price' => $this->total,
                    'status' => OrderStatus::PENDING,
                    'payment_status' => ($this->payment_method === 'online') ? 'pending' : 'completed',
                ]);

                if ($this->delivery_type === 'courier') {
                    Addres::create([
                        'order_id' => $order->id,
                        'street' => $this->street,
                        'house_number' => $this->house_number,
                        'entrance' => $this->entrance,
                        'floor' => $this->floor,
                        'apartment' => $this->apartment,
                        'intercom' => $this->intercom,
                    ]);
                }

                OrderItem::storeMany($order->id, $this->cart);


                if ($this->payment_method === 'online') {
                    return redirect()->route('payment.page', ['order' => $order->id]);
                }


                $this->cart = [];
                session()->forget('cart');

//                session()->flash('message', 'Ваш заказ принят, менеджер скоро свяжется с вами.');
//                return redirect()->route('main');

                return redirect()->route('payment.success');
            });

        } catch (QueryException $e) {
            Log::error('Ошибка при создании заказа: ' . $e->getMessage());

            session()->flash('message', 'Произошла ошибка при оформлении заказа. Попробуйте позже.');
        }

    }


    public function render()
    {
        return view('livewire.front.order')
            ->extends('front.checkout');
    }
}
