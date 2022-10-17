<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show(Request $request)
    {
        $id = $request->route('order');
        $order = Order::findOrFail($id);
        $products = $order->orderDetails->map(function ($orderDetail) {
            return $orderDetail->product;
        });
        return view('orders.show', compact('order', 'products'));
    }
}
