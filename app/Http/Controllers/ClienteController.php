<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;

class ClienteController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        $totalItems   = $cartItems->sum('quantity');
        $totalImporte = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $orders = Order::where('user_id', auth()->id())
                      ->with('items.product')
                      ->orderBy('created_at', 'desc')
                      ->get();

        return view('backend.usuarios.cliente', compact('cartItems', 'totalItems', 'totalImporte', 'orders'));
    }
}