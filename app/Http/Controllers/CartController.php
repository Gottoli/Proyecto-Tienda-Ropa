<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
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

    public function agregar(Request $request, $productId)
    {
    $product = Product::findOrFail($productId);

    $cartItem = CartItem::where('user_id', auth()->id())
                       ->where('product_id', $productId)
                       ->where('talle', $request->talle)
                       ->first();

    if ($cartItem) {
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        CartItem::create([
            'user_id'    => auth()->id(),
            'product_id' => $productId,
            'quantity'   => 1,
            'talle'      => $request->talle,
        ]);
    }

    if ($request->wantsJson()) {
        return response()->json(['message' => 'PRODUCTO AGREGADO →']);
    }

    return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function eliminar($id)
    {
        $cartItem = CartItem::where('id', $id)
                           ->where('user_id', auth()->id())
                           ->firstOrFail();
        $cartItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    public function vaciar()
    {
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->back()->with('success', 'Carrito vaciado.');
    }

    public function confirmar()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        if ($cartItems->isEmpty()) {
            return redirect('/carrito')->with('error', 'Tu carrito está vacío.');
        }

        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => auth()->id(),
            'total'   => $total,
            'estado'  => 'confirmado',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);

            $item->product->stock -= $item->quantity;
            $item->product->save();
        }

        CartItem::where('user_id', auth()->id())->delete();

        return redirect('/compra-exitosa')->with('success', $order->id);
    }

    public function exitosa()
    {
        return view('compra-exitosa');
    }
        public function restar($id)
    {
    $cartItem = CartItem::where('id', $id)
                       ->where('user_id', auth()->id())
                       ->firstOrFail();

    if ($cartItem->quantity > 1) {
        $cartItem->quantity -= 1;
        $cartItem->save();
    } else {
        $cartItem->delete();
    }

     return redirect()->back()->with('success', 'Cantidad actualizada.');
    }
}