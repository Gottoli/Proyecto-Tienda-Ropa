<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta - Lisbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black px-4">
    <span class="navbar-brand">Lisbon</span>
    <div>
        <span class="me-3">{{ auth()->user()->name }}</span>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2>Mi cuenta</h2>
    <span class="badge bg-primary mb-4">Cliente</span>

    {{-- Info del usuario --}}
    <div class="card bg-black text-white p-4 mt-3" style="border: 1px solid #333;">
        <div class="row">
            <div class="col-md-6">
                <p style="color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">NOMBRE</p>
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="col-md-6">
                <p style="color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">EMAIL</p>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="col-md-6">
                <p style="color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">CLIENTE DESDE</p>
                <p>{{ auth()->user()->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Métricas del carrito --}}
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Productos en carrito</h5>
                <h2>{{ $totalItems }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Total en carrito</h5>
                <h2>${{ number_format($totalImporte, 0, ',', '.') }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Items distintos</h5>
                <h2>{{ $cartItems->count() }}</h2>
            </div>
        </div>
    </div>

    {{-- Accesos rápidos --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card bg-black text-white p-4" style="border: 1px solid #333;">
                <h5 style="letter-spacing: 3px; font-size: 0.9rem;">MI CARRITO</h5>
                <p style="color: #aaa; font-size: 0.85rem;">Revisá los productos que agregaste</p>
                <a href="/carrito" class="btn btn-outline-light" style="letter-spacing: 2px; border-radius: 0;">VER CARRITO</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-black text-white p-4" style="border: 1px solid #333;">
                <h5 style="letter-spacing: 3px; font-size: 0.9rem;">CATÁLOGO</h5>
                <p style="color: #aaa; font-size: 0.85rem;">Explorá nuestros productos</p>
                <a href="/catalogo" class="btn btn-outline-light" style="letter-spacing: 2px; border-radius: 0;">VER PRODUCTOS</a>
            </div>
        </div>
    </div>

    {{-- Compras realizadas --}}
@if($orders->count() > 0)
<div class="mt-5">
    <h5 style="letter-spacing: 3px; font-size: 0.9rem;">MIS COMPRAS</h5>
    <hr style="border-color: #333;">

    @foreach($orders as $order)
    <div class="card bg-black text-white p-3 mb-3" style="border: 1px solid #333;">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="mb-1" style="color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">ORDEN #{{ $order->id }}</p>
                <p class="mb-1" style="font-size: 0.85rem;">{{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="text-end">
                <p class="mb-1" style="color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">TOTAL</p>
                <p class="mb-1">${{ number_format($order->total, 0, ',', '.') }}</p>
            </div>
            <span class="badge bg-success">{{ strtoupper($order->estado) }}</span>
        </div>

        <hr style="border-color: #222;">

        <table class="table table-dark table-sm mb-0">
            <thead>
                <tr>
                    <th style="font-size: 0.75rem;">PRODUCTO</th>
                    <th style="font-size: 0.75rem;">CANTIDAD</th>
                    <th style="font-size: 0.75rem;">PRECIO</th>
                    <th style="font-size: 0.75rem;">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td style="font-size: 0.85rem;">{{ $item->product->name }}</td>
                    <td style="font-size: 0.85rem;">{{ $item->quantity }}</td>
                    <td style="font-size: 0.85rem;">${{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="font-size: 0.85rem;">${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endif

</div>

</body>
</html>