<?php

namespace App\Http\Controllers;

use App\ApiServices\Liqpay;
use App\Enums\OrderStatus;
use App\Models\Menu;
use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $cartSevise;

    public function __construct(CartService $service)
    {
        $this->cartSevise = $service;
    }

    public function callback(Request $request)
    {
        $data = $request->input('data');
        $signature = $request->input('signature');

        $private_key = env('LIQPAY_PRIVATE_KEY');
        $generatedSignature = base64_encode(sha1($private_key . $data . $private_key, true));

        if ($signature !== $generatedSignature) {
            Log::error('Invalid signature received', [
                'received_signature' => $signature,
                'generated_signature' => $generatedSignature,
            ]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        $response = json_decode(base64_decode($data), true);

        $order = Order::find($response['order_id']);
        if (!$order) {
            Log::error('Order not found', ['order_id' => $response['order_id']]);
            return response()->json(['error' => 'Order not found'], 404);
        }
        Log::info($response['status']);

        if ($response['status'] == 'success') {
            $order->update(['status' => OrderStatus::CONFIRMED->value, 'payment_status' => 'paid']);
        } elseif ($response['status'] == 'failure' || $response['status'] == 'error') {
            $order->update(['status' => OrderStatus::CANCELED->value, 'payment_status' => 'failed']);
            Log::warning('Payment failed', ['order_id' => $order->id]);
        } else {
            Log::info('Unknown payment status', ['status' => $response['status'], 'order_id' => $order->id]);
        }

        return response()->json(['status' => 'ok']);
    }


    public function paymentPage(Order $order)
    {
        $public_key = env('LIQPAY_PUBLIC_KEY');
        $private_key = env('LIQPAY_PRIVATE_KEY');

        $cart = $this->cartSevise->getCart();

        $items = array_map(fn($item) => "{$item['name']} (x {$item['quantity']})", $cart);

        $description = strip_tags(implode("\n", $items));
        $data = [
            'version' => '3',
            'public_key' => $public_key,
            'action' => 'pay',
            'amount' => $order->total_price,
            'currency' => 'UAH',
            'description' => $description,
            'order_id' => $order->id,
            'result_url' => route('payment.success') . '?data=' . base64_encode(json_encode(['order_id' => $order->id])),
//                'server_url' => route('payment.callback'),
            'server_url' => 'https://f865-91-222-62-227.ngrok-free.app/payment/callback',
        ];


        $json_data = base64_encode(json_encode($data));
        $signature = base64_encode(sha1($private_key . $json_data . $private_key, true));

        $payment_url = "https://www.liqpay.ua/api/3/checkout?data={$json_data}&signature={$signature}";

        return redirect()->away($payment_url);
    }

    public function successPage(Request $request)
    {
        $data = json_decode(base64_decode($request->input('data')), true);
        if (empty($data)) {
            $this->cartSevise->clearCart();
            return view('front.payment_success');
        }


        if (isset($data['order_id'])) {
            $order = Order::find($data['order_id']);
        } else {
            return redirect()->route('payment.failed');
        }

        if ($order && $order->payment_status === 'paid') {
            $this->cartSevise->clearCart();
            return view('front.payment_success', compact('order'));
        } else {
            return redirect()->route('payment.failed');
        }

    }

    public function failedPage()
    {
        return view('front.payment_fail');
    }

}
