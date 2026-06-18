@extends('layout')

@section('contenido')

<div class="container py-5">

    <a href="/catalogo"
       style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); text-decoration: none; transition: opacity 0.15s;"
       onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">
        ← VOLVER AL CATÁLOGO
    </a>

    <hr class="lisbon-hr">

    <div class="row g-0 g-lg-5">

        {{-- ── Imagen ── --}}
        <div class="col-lg-6">
            @if($product->image)
                <img src="/img/{{ $product->image }}"
                     style="width: 100%; height: 700px; object-fit: contain; background: var(--bg-off); display: block;">
            @else
                <div style="width: 100%; height: 700px; background: var(--bg-off); display: flex; align-items: center; justify-content: center;">
                    <span style="color: var(--border); font-size: 12px; letter-spacing: 0.28em;">SIN IMAGEN</span>
                </div>
            @endif
        </div>

        {{-- ── Info ── --}}
        <div class="col-lg-6 pt-5 pt-lg-0">
            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.26em; color: var(--text-3); margin-bottom: 1rem;">{{ strtoupper($product->category->name) }}</p>
            <h1 style="font-size: clamp(30px, 4.5vw, 52px); font-weight: 300; letter-spacing: 0.06em; color: var(--text); line-height: 1.1; margin: 0 0 1.4rem;">
                {{ strtoupper($product->name) }}
            </h1>
            <p style="font-size: 24px; font-weight: 300; letter-spacing: 0.06em; color: var(--text); margin-bottom: 2.2rem;">
                ${{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p style="font-size: 17px; color: var(--text-3); line-height: 1.85; margin-bottom: 1.5rem; letter-spacing: 0.02em;">
                {{ $product->description }}
            </p>

            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); margin-bottom: 2rem;">
                STOCK DISPONIBLE: {{ $product->stock }}
            </p>

            <hr class="lisbon-hr" style="margin: 1.5rem 0 2rem;">

            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST">
                        @csrf

                        @if($product->talles)
                            <div class="mb-4">
                                <p class="lisbon-label" style="margin-bottom: 14px;">SELECCIONÁ TALLE</p>
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

                        <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 18px;">
                            AGREGAR AL CARRITO
                        </button>
                    </form>
                @endif
            @else
                <a href="/login" class="btn-lisbon-filled d-block text-center" style="padding: 18px;">
                    AGREGAR AL CARRITO
                </a>
            @endauth
        </div>
    </div>

</div>

<style>
.talle-btn {
    border: 1px solid var(--border);
    color: var(--text-3);
    padding: 12px 22px;
    font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 0.14em;
    display: inline-block;
    cursor: pointer;
    transition: all 0.15s;
}
.talle-btn:hover { border-color: var(--text); color: var(--text); }
input[type="radio"]:checked + .talle-btn {
    border-color: var(--text);
    background: var(--text);
    color: #fff;
}
</style>

@endsection
