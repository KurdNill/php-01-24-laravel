<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ThankYouPageController extends Controller
{
    public function __invoke(string $vendorOrderId)
    {
        try {
            $order = Order::with(['transaction', 'products', 'status'])
                ->where('vendor_order_id', $vendorOrderId)
                ->firstOrFail();

            $invoiceBtn = auth()->check() && auth()->id() === $order->user_id;

            //            return view('orders/thank-you')
        } catch (\Exception $exception) {

        }
    }
}
