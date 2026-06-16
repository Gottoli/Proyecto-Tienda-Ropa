@extends('layout')

@section('contenido')

<div class="container py-5">
    <a href="/catalogo" style="color: #aaa; letter-spacing: 3px; font-size: 0.75rem; text-decoration: none;">← VOLVER AL CATÁLOGO</a>

    <hr style="border-color: #222; margin: 2rem 0;">

    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="/img/{{ $product->image }}" style="width: 100%; height: 600px; object-fit: contain; background: #111;">
            @else
                <div style="width: 100%; height: 600px; background: #111; display: flex; align-items: center; justify-content: center;">
                    <span style="color: #333; letter-spacing: 3px; font-size: 0.8rem;">SIN IMAGEN</span>
                </div>
            @endif
        </div>

        <div class="col-md-6 ps-5">
            <p style="letter-spacing: 4px; font-size: 0.75rem; color: #aaa;">{{ strtoupper($product->category->name) }}</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">{{ strtoupper($product->name) }}</h2>
            <h4 style="font-weight: 300; letter-spacing: 3px; color: #aaa; margin: 1.5rem 0;">${{ number_format($product->price, 0, ',', '.') }}</h4>

            <p style="color: #aaa; font-size: 0.9rem; line-height: 1.8;">{{ $product->description }}</p>

            <p style="color: #555; font-size: 0.8rem; letter-spacing: 2px; margin-top: 1rem;">STOCK: {{ $product->stock }} unidades</p>

            <hr style="border-color: #222; margin: 2rem 0;">

            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" style="background: #fff; color: #000; border: none; padding: 14px 40px; letter-spacing: 4px; font-size: 0.8rem; cursor: pointer; width: 100%;">AGREGAR AL CARRITO</button>
                    </form>
                @endif
            @else
                <a href="/login" style="background: #fff; color: #000; padding: 14px 40px; letter-spacing: 4px; font-size: 0.8rem; width: 100%; text-align: center; text-decoration: none; display: block;">AGREGAR AL CARRITO</a>
            @endauth
        </div>
    </div>
</div>

@endsection