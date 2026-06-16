@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">MI CUENTA</span>
        <a href="/cliente" class="is-active">PERFIL</a>
        <a href="/carrito">CARRITO</a>
        <a href="/catalogo">CATÁLOGO</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">PANEL PERSONAL</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 2.5rem;">MI CUENTA</h2>

    {{-- Info del usuario --}}
    <div class="lisbon-card" style="padding: 2rem; margin-bottom: 2rem;">
        <div class="row">
            <div class="col-md-4">
                <p class="lisbon-label">NOMBRE</p>
                <p style="color: var(--text-1); font-size: 1rem; letter-spacing: 1px;">{{ auth()->user()->name }}</p>
            </div>
            <div class="col-md-4">
                <p class="lisbon-label">EMAIL</p>
                <p style="color: var(--text-1); font-size: 1rem;">{{ auth()->user()->email }}</p>
            </div>
            <div class="col-md-4">
                <p class="lisbon-label">CLIENTE DESDE</p>
                <p style="color: var(--text-1); font-size: 1rem;">{{ auth()->user()->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Métricas --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="lisbon-card" style="padding: 2rem; text-align: center;">
                <p style="letter-spacing: 3px; font-size: 0.68rem; color: var(--text-3); margin-bottom: 1rem;">PRODUCTOS EN CARRITO</p>
                <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.8rem; color: var(--olive-dark); margin: 0;">{{ $totalItems }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="lisbon-card" style="padding: 2rem; text-align: center;">
                <p style="letter-spacing: 3px; font-size: 0.68rem; color: var(--text-3); margin-bottom: 1rem;">TOTAL EN CARRITO</p>
                <h2 style="font-weight: 300; letter-spacing: 3px; font-size: 2rem; color: var(--olive-dark); margin: 0;">${{ number_format($totalImporte, 0, ',', '.') }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="lisbon-card" style="padding: 2rem; text-align: center;">
                <p style="letter-spacing: 3px; font-size: 0.68rem; color: var(--text-3); margin-bottom: 1rem;">ITEMS DISTINTOS</p>
                <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.8rem; color: var(--olive-dark); margin: 0;">{{ $cartItems->count() }}</h2>
            </div>
        </div>
    </div>

    {{-- Accesos --}}
    <div class="row g-3 mb-5">
        <div class="col-md-6">
            <div class="lisbon-card" style="padding: 2rem;">
                <p style="letter-spacing: 4px; font-size: 0.72rem; color: var(--olive); margin-bottom: 0.5rem;">MI CARRITO</p>
                <p style="color: var(--text-3); font-size: 0.85rem; margin-bottom: 1.5rem;">Revisá los productos que agregaste</p>
                <a href="/carrito" class="btn-lisbon">VER CARRITO</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="lisbon-card" style="padding: 2rem;">
                <p style="letter-spacing: 4px; font-size: 0.72rem; color: var(--olive); margin-bottom: 0.5rem;">CATÁLOGO</p>
                <p style="color: var(--text-3); font-size: 0.85rem; margin-bottom: 1.5rem;">Explorá nuestros productos</p>
                <a href="/catalogo" class="btn-lisbon">VER PRODUCTOS</a>
            </div>
        </div>
    </div>

    {{-- Historial de compras --}}
    @if($orders->count() > 0)
    <hr class="lisbon-hr">
    <p class="page-eyebrow" style="margin-bottom: 1.5rem;">HISTORIAL</p>
    <h5 style="font-weight: 300; letter-spacing: 4px; color: var(--olive-dark); margin-bottom: 2rem;">MIS COMPRAS</h5>

    @foreach($orders as $order)
    <div class="lisbon-card" style="padding: 1.5rem; margin-bottom: 1rem;">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <p class="lisbon-label" style="margin-bottom: 4px;">ORDEN #{{ $order->id }}</p>
                <p style="color: var(--text-2); font-size: 0.85rem;">{{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="text-end">
                <p class="lisbon-label" style="margin-bottom: 4px;">TOTAL</p>
                <p style="color: var(--olive-dark); font-size: 1rem; letter-spacing: 2px;">${{ number_format($order->total, 0, ',', '.') }}</p>
            </div>
            <span class="badge-olive">{{ strtoupper($order->estado) }}</span>
        </div>

        <hr class="lisbon-hr" style="margin: 1rem 0;">

        <table class="lisbon-table">
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="color: var(--olive);">${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
    @endif

</div>

@endsection
