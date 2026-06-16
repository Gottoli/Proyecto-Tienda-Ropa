@extends('layout')

@section('contenido')

<div class="container py-5">
    <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">MI CUENTA</p>
    <h2 style="font-weight: 300; letter-spacing: 4px;">CARRITO DE COMPRAS</h2>
    <hr style="border-color: #222; margin: 2rem 0;">

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p style="color: #aaa; letter-spacing: 2px;">TU CARRITO ESTÁ VACÍO</p>
        <a href="/catalogo" style="color: #fff; letter-spacing: 3px; font-size: 0.8rem;">VER CATÁLOGO →</a>
    @else
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ strtoupper($item->product->name) }}
                     @if($item->talle)
                         <br><small style="color: #aaa; letter-spacing: 2px; font-size: 0.7rem;">TALLE: {{ $item->talle }}</small>
                        @endif
                    </td>
                    <td>${{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>
                    <div class="d-flex align-items-center gap-2">
                    <form action="/carrito/restar/{{ $item->id }}" method="POST">
                     @csrf
                    <button type="submit" style="background: none; border: 1px solid #555; color: #aaa; padding: 2px 10px; cursor: pointer;">-</button>
                    </form>
                     <span>{{ $item->quantity }}</span>
                     <form action="/carrito/agregar/{{ $item->product->id }}" method="POST">
                     @csrf
                     <button type="submit" style="background: none; border: 1px solid #555; color: #aaa; padding: 2px 10px; cursor: pointer;">+</button>
                     </form>
                     </div>
                    </td>
                    <td>${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="/carrito/eliminar/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: 1px solid #555; color: #aaa; padding: 4px 12px; font-size: 0.75rem; letter-spacing: 2px; cursor: pointer;">ELIMINAR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="/carrito/vaciar" method="POST">
                @csrf
                <button type="submit" style="background: none; border: 1px solid #555; color: #aaa; padding: 8px 24px; letter-spacing: 3px; font-size: 0.75rem; cursor: pointer;">VACIAR CARRITO</button>
            </form>

            <div style="text-align: right;">
                <p style="color: #aaa; letter-spacing: 2px; font-size: 0.9rem;">TOTAL</p>
                <h3 style="font-weight: 300; letter-spacing: 4px;">${{ number_format($total, 0, ',', '.') }}</h3>
                <form action="/carrito/confirmar" method="POST">
                    @csrf
                    <button type="submit" style="background: #fff; color: #000; border: none; padding: 12px 40px; letter-spacing: 4px; font-size: 0.8rem; cursor: pointer; margin-top: 1rem;">CONFIRMAR COMPRA</button>
                </form>
            </div>
        </div>
    @endif
</div>

@endsection