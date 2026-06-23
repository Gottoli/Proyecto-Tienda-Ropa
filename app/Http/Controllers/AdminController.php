<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Consulta;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\ConsultaLeidaMail;

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
            'category_id' => 'required|exists:categories,id',
            'genero'      => 'required|in:hombre,mujer,unisex',
            'imagen_principal' => 'required|image|max:4096',
            'imagenes_extra.*' => 'nullable|image|max:4096',
        ]);

        $stockTalles = $this->buildStockTalles($request);
        $totalStock  = $stockTalles ? array_sum($stockTalles) : (int) $request->input('stock', 0);

        $data = [
            'name'         => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'stock'        => $totalStock,
            'stock_talles' => $stockTalles ?: null,
            'talles'       => $request->talles ?: null,
            'category_id'  => $request->category_id,
            'genero'       => $request->genero,
            'active'       => $request->has('active'),
        ];

        [$mainImage, $extraImages] = $this->handleImageUploads($request);
        if ($mainImage)   $data['image']  = $mainImage;
        if ($extraImages) $data['images'] = $extraImages;

        Product::create($data);

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
            'name'             => 'required|string|max:150',
            'description'      => 'nullable|string',
            'price'            => 'required|numeric|min:0',
            'category_id'      => 'required|exists:categories,id',
            'genero'           => 'required|in:hombre,mujer,unisex',
            'imagen_principal' => 'nullable|image|max:4096',
            'imagenes_extra.*' => 'nullable|image|max:4096',
        ]);

        $stockTalles = $this->buildStockTalles($request);
        $totalStock  = $stockTalles ? array_sum($stockTalles) : (int) $request->input('stock', $product->stock);

        $data = [
            'name'         => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'stock'        => $totalStock,
            'stock_talles' => $stockTalles ?: $product->stock_talles,
            'talles'       => $request->talles ?: $product->talles,
            'category_id'  => $request->category_id,
            'genero'       => $request->genero,
            'active'       => $request->has('active'),
        ];

        [$mainImage, $extraImages] = $this->handleImageUploads($request);
        if ($mainImage)   $data['image']  = $mainImage;
        if ($extraImages) $data['images'] = $extraImages;

        $product->update($data);

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

    try {
        Mail::to($consulta->email)->send(new ConsultaLeidaMail($consulta));
    } catch (\Throwable $e) {
        report($e);
    }

    return redirect()->back()->with('success', 'Consulta marcada como leída.');
    }

    public function usuarios()
    {
        $usuarios = User::withCount('cartItems')
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('backend.admin.usuarios', compact('usuarios'));
    }

    public function ventas()
    {
        $orders = Order::with(['user', 'items.product'])
            ->orderBy('created_at', 'desc')
            ->get();

        $totalIngresos = $orders->sum('total');
        $totalOrdenes  = $orders->count();
        $totalItems    = OrderItem::sum('quantity');

        $topProductos = OrderItem::with('product')
            ->selectRaw('product_id, SUM(quantity) as total_vendido, SUM(price * quantity) as total_ingresos')
            ->groupBy('product_id')
            ->orderByDesc('total_vendido')
            ->take(8)
            ->get();

        return view('backend.admin.ventas', compact(
            'orders', 'totalIngresos', 'totalOrdenes', 'totalItems', 'topProductos'
        ));
    }

    private function handleImageUploads(Request $request): array
    {
        $mainImage   = null;
        $extraImages = [];

        if ($request->hasFile('imagen_principal')) {
            $file      = $request->file('imagen_principal');
            $name      = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('img'), $name);
            $mainImage = $name;
        }

        if ($request->hasFile('imagenes_extra')) {
            foreach ($request->file('imagenes_extra') as $file) {
                $name = time() . '_' . mt_rand(100, 999) . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move(public_path('img'), $name);
                $extraImages[] = $name;
            }
        }

        if ($mainImage && !empty($extraImages)) {
            $extraImages = array_merge([$mainImage], $extraImages);
        }

        return [$mainImage, !empty($extraImages) ? $extraImages : null];
    }

    private function buildStockTalles(Request $request): ?array
    {
        if (!$request->has('stock_talles') || !is_array($request->stock_talles)) {
            return null;
        }
        $result = [];
        foreach ($request->stock_talles as $talle => $qty) {
            $talle = trim($talle);
            if ($talle !== '') {
                $result[$talle] = max(0, (int) $qty);
            }
        }
        return !empty($result) ? $result : null;
    }
}