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

    public function actualizarPerfil(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'      => 'required|string|max:150',
            'email'     => 'required|email|max:150|unique:users,email,' . $user->id,
            'telefono'  => 'nullable|string|max:30',
            'dni'       => 'nullable|digits_between:7,9',
            'direccion' => 'nullable|string|max:200',
            'ciudad'    => 'nullable|string|max:100',
            'localidad' => 'nullable|string|max:100',
        ]);

        $user->update($request->only(['name', 'email', 'telefono', 'dni', 'direccion', 'ciudad', 'localidad']));

        return redirect('/cliente')->with('success', 'Datos actualizados correctamente.');
    }
}