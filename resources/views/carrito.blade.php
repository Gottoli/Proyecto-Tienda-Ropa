@extends('layout')

@section('title', 'Mi Carrito | LISBON™')

@section('contenido')

<div class="container py-5">

    <p class="page-eyebrow">"MI CUENTA"</p>
    <h1 class="page-title" style="margin-bottom: 0;">CARRITO</h1>
    <hr class="lisbon-hr">

    @if(session('success'))
        <div class="lisbon-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p style="font-size: 15px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); margin: 4rem 0 2rem;">TU CARRITO ESTÁ VACÍO.</p>
        <a href="/catalogo" class="btn-lisbon">VER CATÁLOGO →</a>
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
                        <span style="font-size: 14px; font-weight: 500; letter-spacing: 0.08em; color: var(--text);">{{ strtoupper($item->product->name) }}</span>
                        @if($item->talle)
                            <br><small style="font-size: 11px; letter-spacing: 0.16em; color: var(--text-3);">TALLE: {{ $item->talle }}</small>
                        @endif
                    </td>
                    <td style="font-size: 15px; color: var(--text-2);">${{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <form action="/carrito/restar/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-lisbon-ghost" style="padding: 6px 14px; font-size: 16px;">−</button>
                            </form>
                            <span style="font-size: 16px; font-weight: 500; color: var(--text); min-width: 32px; text-align: center;">{{ $item->quantity }}</span>
                            <form action="/carrito/agregar/{{ $item->product->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-lisbon-ghost" style="padding: 6px 14px; font-size: 16px;">+</button>
                            </form>
                        </div>
                    </td>
                    <td style="font-size: 16px; font-weight: 500; color: var(--text);">${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="/carrito/eliminar/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-lisbon-ghost" style="padding: 7px 15px; font-size: 12px; letter-spacing: 0.14em;">ELIMINAR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-end mt-5 pt-4" style="border-top: 1px solid var(--border);">
            <form action="/carrito/vaciar" method="POST">
                @csrf
                <button type="submit" class="btn-lisbon-ghost">VACIAR CARRITO</button>
            </form>

            <div style="text-align: right;">
                <p class="lisbon-label" style="margin-bottom: 10px;">TOTAL DEL PEDIDO</p>
                <p style="font-size: clamp(32px, 5vw, 56px); font-weight: 300; letter-spacing: 0.06em; color: var(--text); margin-bottom: 2rem; line-height: 1;">
                    ${{ number_format($total, 0, ',', '.') }}
                </p>
                <a href="/carrito/checkout" class="btn-lisbon-filled" style="padding: 17px 56px; display: inline-block;">
                    PROCEDER AL PAGO →
                </a>
            </div>
        </div>
    @endif

</div>

@endsection
