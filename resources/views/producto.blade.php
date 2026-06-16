@extends('layout')

@section('contenido')

<div class="container py-5">

    <a href="/catalogo" style="color: var(--text-3); letter-spacing: 3px; font-size: 0.72rem; text-decoration: none; transition: color 0.2s;"
       onmouseover="this.style.color='var(--olive)'" onmouseout="this.style.color='var(--text-3)'">
        ← VOLVER AL CATÁLOGO
    </a>

    <hr class="lisbon-hr">

    <div class="row g-5">
        {{-- Imagen --}}
        <div class="col-md-6">
            @if($product->image)
                <img src="/img/{{ $product->image }}"
                     style="width: 100%; height: 620px; object-fit: contain; background: var(--bone); display: block;">
            @else
                <div style="width: 100%; height: 620px; background: var(--bone); display: flex; align-items: center; justify-content: center;">
                    <span style="color: var(--border); letter-spacing: 3px; font-size: 0.72rem;">SIN IMAGEN</span>
                </div>
            @endif
        </div>

        {{-- Info --}}
        <div class="col-md-6">
            <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive-light);">{{ strtoupper($product->category->name) }}</p>
            <h2 style="font-weight: 300; letter-spacing: 5px; color: var(--olive-dark); font-size: 1.9rem; line-height: 1.4; margin: 1rem 0;">{{ strtoupper($product->name) }}</h2>
            <p style="font-weight: 300; letter-spacing: 3px; color: var(--olive); font-size: 1.3rem; margin-bottom: 2rem;">${{ number_format($product->price, 0, ',', '.') }}</p>

            <p style="color: var(--text-2); font-size: 0.95rem; line-height: 1.9; margin-bottom: 1.5rem;">{{ $product->description }}</p>

            <p style="color: var(--text-3); font-size: 0.72rem; letter-spacing: 3px;">STOCK DISPONIBLE: {{ $product->stock }}</p>

            <hr class="lisbon-hr">

            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST">
                        @csrf

                        @if($product->talles)
                            <div class="mb-4">
                                <p class="lisbon-label">SELECCIONÁ TALLE</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach(explode(',', $product->talles) as $talle)
                                        <label style="cursor: pointer;">
                                            <input type="radio" name="talle" value="{{ trim($talle) }}" style="display: none;" required>
                                            <span class="talle-btn">{{ trim($talle) }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 15px;">
                            AGREGAR AL CARRITO
                        </button>
                    </form>
                @endif
            @else
                <a href="/login" class="btn-lisbon-filled d-block text-center" style="padding: 15px;">
                    AGREGAR AL CARRITO
                </a>
            @endauth
        </div>
    </div>

</div>

<style>
.talle-btn {
    border: 1px solid var(--border);
    color: var(--text-2);
    padding: 9px 18px;
    font-size: 0.78rem;
    letter-spacing: 2px;
    display: inline-block;
    cursor: pointer;
    transition: all 0.2s;
    font-family: 'Georgia', serif;
}
.talle-btn:hover { border-color: var(--olive); color: var(--olive); }
input[type="radio"]:checked + .talle-btn {
    border-color: var(--olive);
    background: var(--olive);
    color: var(--cream);
}
</style>

@endsection
