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

    public function checkout()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        if ($cartItems->isEmpty()) {
            return redirect('/carrito')->with('error', 'Tu carrito está vacío.');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));
    }

    public function confirmar(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:150',
            'dni'             => 'required|string|max:20',
            'direccion'       => 'required|string|max:200',
            'ciudad'          => 'required|string|max:100',
            'localidad'       => 'nullable|string|max:100',
            'metodo_pago'     => 'required|in:transferencia,tarjeta',
        ]);

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
            'user_id'         => auth()->id(),
            'total'           => $total,
            'estado'          => 'confirmado',
            'nombre_completo' => $request->nombre_completo,
            'dni'             => $request->dni,
            'direccion'       => $request->direccion,
            'ciudad'          => $request->ciudad,
            'localidad'       => $request->localidad,
            'metodo_pago'     => $request->metodo_pago,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'talle'      => $item->talle,
                'price'      => $item->product->price,
            ]);

            $prod = $item->product;
            if ($prod->stock_talles && $item->talle && isset($prod->stock_talles[$item->talle])) {
                $st = $prod->stock_talles;
                $st[$item->talle] = max(0, $st[$item->talle] - $item->quantity);
                $prod->stock_talles = $st;
                $prod->stock = array_sum($st);
            } else {
                $prod->stock = max(0, $prod->stock - $item->quantity);
            }
            $prod->save();
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