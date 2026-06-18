@extends('layout')

@section('contenido')

<div class="container-fluid px-lg-5 py-5">

    <div style="max-width: 1400px; margin: 0 auto 3.5rem;">
        <p class="page-eyebrow">"COLECCIÓN 2026"</p>
        <h1 class="page-title" style="margin-bottom: 0;">CATÁLOGO</h1>
    </div>

    {{-- ── Filtros ── --}}
    <div style="max-width: 1400px; margin: 0 auto; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 20px 0; margin-bottom: 4.5rem; display: flex; align-items: center; flex-wrap: wrap; gap: 4px;">
        <button onclick="filtrar('todos','todos')" class="btn-filtro is-active" id="btn-todos">TODOS</button>
        <span style="color: var(--border); padding: 0 12px; font-size: 18px; user-select: none;">|</span>
        <span style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); padding: 0 8px;">HOMBRE</span>
        <button onclick="filtrar('camperas','hombre')"   class="btn-filtro" id="btn-camperas-hombre">CAMPERAS</button>
        <button onclick="filtrar('remeras','hombre')"    class="btn-filtro" id="btn-remeras-hombre">REMERAS</button>
        <button onclick="filtrar('pantalones','hombre')" class="btn-filtro" id="btn-pantalones-hombre">PANTALONES</button>
        <button onclick="filtrar('buzos','hombre')"      class="btn-filtro" id="btn-buzos-hombre">BUZOS</button>
        <span style="color: var(--border); padding: 0 12px; font-size: 18px; user-select: none;">|</span>
        <span style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); padding: 0 8px;">MUJER</span>
        <button onclick="filtrar('camperas','mujer')"    class="btn-filtro" id="btn-camperas-mujer">CAMPERAS</button>
        <button onclick="filtrar('remeras','mujer')"     class="btn-filtro" id="btn-remeras-mujer">REMERAS</button>
        <button onclick="filtrar('pantalones','mujer')"  class="btn-filtro" id="btn-pantalones-mujer">PANTALONES</button>
        <button onclick="filtrar('buzos','mujer')"       class="btn-filtro" id="btn-buzos-mujer">BUZOS</button>
    </div>

    {{-- ── Grid ── --}}
    <div class="row g-0" id="productos" style="max-width: 1400px; margin: 0 auto;">
        @foreach($products as $product)
        <div class="col-6 col-lg-4 producto" style="padding: 0 3px 56px;" data-categoria="{{ $product->category->slug }}" data-genero="hombre mujer">
            <a href="/catalogo/{{ $product->id }}" style="text-decoration: none; color: inherit; display: block;">
                @if($product->image)
                    <img src="/img/{{ $product->image }}"
                         style="width: 100%; height: clamp(380px, 38vw, 640px); object-fit: contain; background: var(--bg-off); display: block;">
                @else
                    <div style="width: 100%; height: clamp(380px, 38vw, 640px); background: var(--bg-off); display: flex; align-items: center; justify-content: center;">
                        <span style="color: var(--border); font-size: 12px; letter-spacing: 0.28em;">SIN IMAGEN</span>
                    </div>
                @endif
            </a>
            <div style="padding: 18px 4px 14px;">
                <a href="/catalogo/{{ $product->id }}" style="text-decoration: none; color: inherit;">
                    <p style="font-size: 16px; font-weight: 500; letter-spacing: 0.08em; color: var(--text); margin: 0 0 7px;">{{ strtoupper($product->name) }}</p>
                </a>
                <p style="font-size: 17px; font-weight: 300; color: var(--text-3); letter-spacing: 0.04em; margin-bottom: 16px;">${{ number_format($product->price, 0, ',', '.') }}</p>
                <a href="/catalogo/{{ $product->id }}" style="font-size: 12px; letter-spacing: 0.18em; color: var(--text-3); text-decoration: none; transition: opacity 0.15s;"
                   onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">VER DETALLE →</a>
            </div>
            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST" data-add-to-cart style="padding: 0 4px;">
                        @csrf
                        <button type="submit" class="btn-lisbon" style="width: 100%; text-align: center; margin-top: 4px;">AGREGAR AL CARRITO</button>
                    </form>
                @endif
            @else
                <a href="/login" class="btn-lisbon d-block text-center" style="margin-top: 4px;">AGREGAR AL CARRITO</a>
            @endauth
        </div>
        @endforeach
    </div>

</div>

<style>
.btn-filtro {
    background: none;
    border: none;
    color: var(--text-3);
    font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 0.16em;
    padding: 7px 15px;
    cursor: pointer;
    transition: color 0.15s;
    position: relative;
}
.btn-filtro::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 15px;
    right: 15px;
    height: 1px;
    background: var(--text);
    opacity: 0;
    transition: opacity 0.15s;
}
.btn-filtro:hover { color: var(--text); }
.btn-filtro.is-active { color: var(--text); }
.btn-filtro.is-active::after { opacity: 1; }
</style>

<script>
function filtrar(categoria, genero) {
    document.querySelectorAll('.btn-filtro').forEach(b => b.classList.remove('is-active'));
    document.querySelectorAll('.producto').forEach(p => {
        const catOk = categoria === 'todos' || p.dataset.categoria === categoria;
        const genOk = genero === 'todos' || p.dataset.genero.includes(genero);
        p.style.display = (catOk && genOk) ? '' : 'none';
    });
    const clicked = document.getElementById('btn-' + (categoria === 'todos' ? 'todos' : categoria + '-' + genero));
    if (clicked) clicked.classList.add('is-active');
}
const params = new URLSearchParams(window.location.search);
const catUrl = params.get('categoria');
const genUrl = params.get('genero');
if (catUrl || genUrl) filtrar(catUrl || 'todos', genUrl || 'todos');
</script>

@endsection
