<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Store a new order
    public function store(Request $request)
    {
        // Create a new order with user info
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending'
        ]);

        // Create order items
        foreach ($request->cart_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
    }

    // Show a specific order (optional)
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
