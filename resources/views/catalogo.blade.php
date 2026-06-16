@extends('layout')

@section('contenido')

<div class="container py-5">

    <p class="page-eyebrow">COLECCIÓN 2026</p>
    <h2 class="page-title" style="font-size: 2.2rem; margin-bottom: 0.5rem;">CATÁLOGO</h2>
    <hr class="lisbon-hr">

    {{-- Filtros --}}
    <div class="mb-5">
        <button onclick="filtrar('todos','todos')" class="btn-filtro is-active" id="btn-todos">TODOS</button>
        <span style="color: var(--border); margin: 0 12px;">|</span>
        <span style="color: var(--text-3); letter-spacing: 3px; font-size: 0.72rem; margin-right: 10px;">HOMBRE:</span>
        <button onclick="filtrar('camperas','hombre')"  class="btn-filtro" id="btn-camperas-hombre">CAMPERAS</button>
        <button onclick="filtrar('remeras','hombre')"   class="btn-filtro" id="btn-remeras-hombre">REMERAS</button>
        <button onclick="filtrar('pantalones','hombre')"class="btn-filtro" id="btn-pantalones-hombre">PANTALONES</button>
        <button onclick="filtrar('buzos','hombre')"     class="btn-filtro" id="btn-buzos-hombre">BUZOS</button>
        <span style="color: var(--border); margin: 0 12px;">|</span>
        <span style="color: var(--text-3); letter-spacing: 3px; font-size: 0.72rem; margin-right: 10px;">MUJER:</span>
        <button onclick="filtrar('camperas','mujer')"   class="btn-filtro" id="btn-camperas-mujer">CAMPERAS</button>
        <button onclick="filtrar('remeras','mujer')"    class="btn-filtro" id="btn-remeras-mujer">REMERAS</button>
        <button onclick="filtrar('pantalones','mujer')" class="btn-filtro" id="btn-pantalones-mujer">PANTALONES</button>
        <button onclick="filtrar('buzos','mujer')"      class="btn-filtro" id="btn-buzos-mujer">BUZOS</button>
    </div>

    {{-- Grid --}}
    <div class="row g-4" id="productos">
        @foreach($products as $product)
        <div class="col-md-4 producto" data-categoria="{{ strtolower($product->category->name) }}" data-genero="hombre mujer">
            <a href="/catalogo/{{ $product->id }}" style="text-decoration: none; color: inherit; display: block;">
                @if($product->image)
                    <img src="/img/{{ $product->image }}"
                         style="width: 100%; height: 460px; object-fit: contain; background: var(--bone); display: block;">
                @else
                    <div style="width: 100%; height: 460px; background: var(--bone); display: flex; align-items: center; justify-content: center;">
                        <span style="color: var(--border); letter-spacing: 3px; font-size: 0.72rem;">SIN IMAGEN</span>
                    </div>
                @endif
                <div class="mt-3">
                    <p style="letter-spacing: 3px; font-size: 0.82rem; color: var(--text-1); margin-bottom: 4px;">{{ strtoupper($product->name) }}</p>
                    <p style="color: var(--olive); font-size: 0.9rem; letter-spacing: 2px; margin-bottom: 8px;">${{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </a>
            <p style="color: var(--text-3); letter-spacing: 2px; font-size: 0.72rem; margin-bottom: 10px;">
                <a href="/catalogo/{{ $product->id }}" style="color: var(--text-3); text-decoration: none; transition: color 0.2s;"
                   onmouseover="this.style.color='var(--olive)'" onmouseout="this.style.color='var(--text-3)'">
                    VER DETALLE →
                </a>
            </p>
            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-lisbon" style="width: 100%; text-align: center;">AGREGAR AL CARRITO</button>
                    </form>
                @endif
            @else
                <a href="/login" class="btn-lisbon d-block text-center">AGREGAR AL CARRITO</a>
            @endauth
        </div>
        @endforeach
    </div>

</div>

<style>
.btn-filtro {
    background: none;
    border: 1px solid var(--border);
    color: var(--text-3);
    letter-spacing: 3px;
    font-size: 0.72rem;
    padding: 8px 18px;
    margin-right: 6px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: all 0.2s;
    font-family: 'Georgia', serif;
}
.btn-filtro:hover, .btn-filtro.is-active {
    border-color: var(--olive);
    color: var(--olive);
}
</style>

<script>
function filtrar(categoria, genero) {
    document.querySelectorAll('.btn-filtro').forEach(b => b.classList.remove('is-active'));
    document.querySelectorAll('.producto').forEach(p => {
        const catOk  = categoria === 'todos' || p.dataset.categoria === categoria;
        const genOk  = genero === 'todos' || p.dataset.genero.includes(genero);
        p.style.display = (catOk && genOk) ? '' : 'none';
    });
}
const params   = new URLSearchParams(window.location.search);
const catUrl   = params.get('categoria');
const genUrl   = params.get('genero');
if (catUrl || genUrl) filtrar(catUrl || 'todos', genUrl || 'todos');
</script>

@endsection
