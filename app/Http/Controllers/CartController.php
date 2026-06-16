<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    // Ver el carrito
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('carrito', compact('cartItems', 'total'));
    }

    // Agregar producto al carrito
    public function agregar(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('user_id', auth()->id())
                           ->where('product_id', $productId)
                           ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id'    => auth()->id(),
                'product_id' => $productId,
                'quantity'   => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    // Eliminar producto del carrito
    public function eliminar($id)
    {
        $cartItem = CartItem::where('id', $id)
                           ->where('user_id', auth()->id())
                           ->firstOrFail();
        $cartItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    // Vaciar carrito
    public function vaciar()
    {
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->back()->with('success', 'Carrito vaciado.');
    }
}