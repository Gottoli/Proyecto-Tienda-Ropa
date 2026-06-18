<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Consulta;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios  = User::count();
        $productos = Product::count();
        $consultas = Consulta::where('leida', false)->count();
        $itemsCarrito  = \App\Models\CartItem::count();

        return view('backend.admin.dashboard', compact('usuarios', 'productos', 'consultas', 'itemsCarrito'));
    }

    public function productos()
    {
        $products = Product::with('category')->get();
        return view('backend.admin.productos', compact('products'));
    }

    public function crearProducto()
    {
        $categories = Category::where('active', true)->get();
        return view('backend.admin.crear-producto', compact('categories'));
    }

    public function guardarProducto(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

       Product::create([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'talles'      => $request->talles,
        'category_id' => $request->category_id,
        'active'      => $request->has('active'),
    ]);

        return redirect('/admin/productos')->with('success', 'Producto creado correctamente.');
    }

    public function editarProducto($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::where('active', true)->get();
        return view('backend.admin.editar-producto', compact('product', 'categories'));
    }

    public function actualizarProducto(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'talles'      => $request->talles,
        'category_id' => $request->category_id,
        'active'      => $request->has('active'),
        ]);

        return redirect('/admin/productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto($id)
    {
        $product = Product::findOrFail($id);
        $product->active = false;
        $product->save();

        return redirect('/admin/productos')->with('success', 'Producto desactivado correctamente.');
    }
    public function activarProducto($id)
    {
        $product = Product::findOrFail($id);
        $product->active = true;
        $product->save();

        return redirect('/admin/productos')->with('success', 'Producto activado correctamente.');
    }
    public function consultas()
    {
    $consultas = Consulta::orderBy('created_at', 'desc')->get();
    return view('backend.admin.consultas', compact('consultas'));
    }

    public function marcarLeida($id)
    {
    $consulta = Consulta::findOrFail($id);
    $consulta->leida = true;
    $consulta->save();

    return redirect()->back()->with('success', 'Consulta marcada como leída.');
    }

    public function usuarios()
    {
       $usuarios = User::withCount('cartItems')
                    ->orderBy('created_at', 'desc')
                    ->get();
    return view('backend.admin.usuarios', compact('usuarios'));
    }
}