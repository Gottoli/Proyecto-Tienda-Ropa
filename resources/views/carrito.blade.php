@extends('layout')

@section('contenido')

<div class="container py-5">

    <p class="page-eyebrow">MI CUENTA</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 0;">CARRITO DE COMPRAS</h2>
    <hr class="lisbon-hr">

    @if(session('success'))
        <div class="lisbon-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p style="color: var(--text-3); letter-spacing: 3px; font-size: 0.85rem; margin: 3rem 0 1.5rem;">TU CARRITO ESTÁ VACÍO</p>
        <a href="/catalogo" class="btn-lisbon">VER CATÁLOGO</a>
    @else
        <table class="lisbon-table">
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th>PRECIO UNIT.</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        <span style="letter-spacing: 2px; font-size: 0.85rem; color: var(--text-1);">{{ strtoupper($item->product->name) }}</span>
                        @if($item->talle)
                            <br><small style="color: var(--text-3); letter-spacing: 2px; font-size: 0.7rem;">TALLE: {{ $item->talle }}</small>
                        @endif
                    </td>
                    <td>${{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <form action="/carrito/restar/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-lisbon-ghost" style="padding: 4px 12px;">−</button>
                            </form>
                            <span style="color: var(--text-1); min-width: 24px; text-align: center;">{{ $item->quantity }}</span>
                            <form action="/carrito/agregar/{{ $item->product->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-lisbon-ghost" style="padding: 4px 12px;">+</button>
                            </form>
                        </div>
                    </td>
                    <td style="color: var(--olive); letter-spacing: 1px;">${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="/carrito/eliminar/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-lisbon-ghost" style="padding: 5px 14px; font-size: 0.68rem; letter-spacing: 2px;">ELIMINAR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-end mt-5 pt-3" style="border-top: 1px solid var(--border);">
            <form action="/carrito/vaciar" method="POST">
                @csrf
                <button type="submit" class="btn-lisbon-ghost">VACIAR CARRITO</button>
            </form>

            <div style="text-align: right;">
                <p class="lisbon-label" style="margin-bottom: 6px;">TOTAL DEL PEDIDO</p>
                <h3 style="font-weight: 300; letter-spacing: 5px; color: var(--olive-dark); font-size: 2rem; margin-bottom: 1.5rem;">${{ number_format($total, 0, ',', '.') }}</h3>
                <form action="/carrito/confirmar" method="POST">
                    @csrf
                    <button type="submit" class="btn-lisbon-filled" style="padding: 14px 48px;">CONFIRMAR COMPRA</button>
                </form>
            </div>
        </div>
    @endif

</div>

@endsection
