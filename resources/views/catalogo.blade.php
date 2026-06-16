@extends('layout')

@section('contenido')

<div class="container py-5">
    <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">COLECCIÓN 2026</p>
    <h2 style="font-weight: 300; letter-spacing: 4px;">CATÁLOGO</h2>
    <hr style="border-color: #222; margin: 2rem 0;">

    <div class="mb-4">
        <button onclick="filtrar('todos', 'todos')" class="btn-filtro activo" id="btn-todos">TODOS</button>
    
        <span style="color: #555; margin: 0 10px;">|</span>
    
        <span style="color: #aaa; letter-spacing: 3px; font-size: 0.75rem; margin-right: 10px;">HOMBRE:</span>
        <button onclick="filtrar('camperas', 'hombre')" class="btn-filtro" id="btn-camperas-hombre">CAMPERAS</button>
        <button onclick="filtrar('remeras', 'hombre')" class="btn-filtro" id="btn-remeras-hombre">REMERAS</button>
        <button onclick="filtrar('pantalones', 'hombre')" class="btn-filtro" id="btn-pantalones-hombre">PANTALONES</button>
        <button onclick="filtrar('buzos', 'hombre')" class="btn-filtro" id="btn-buzos-hombre">BUZOS</button>

        <span style="color: #555; margin: 0 10px;">|</span>

        <span style="color: #aaa; letter-spacing: 3px; font-size: 0.75rem; margin-right: 10px;">MUJER:</span>
        <button onclick="filtrar('camperas', 'mujer')" class="btn-filtro" id="btn-camperas-mujer">CAMPERAS</button>
        <button onclick="filtrar('remeras', 'mujer')" class="btn-filtro" id="btn-remeras-mujer">REMERAS</button>
        <button onclick="filtrar('pantalones', 'mujer')" class="btn-filtro" id="btn-pantalones-mujer">PANTALONES</button>
        <button onclick="filtrar('buzos', 'mujer')" class="btn-filtro" id="btn-buzos-mujer">BUZOS</button>
    </div>

    <div class="row g-4" id="productos">

    @foreach($products as $product)
    <div class="col-md-4 producto" data-categoria="{{ strtolower($product->category->name) }}" data-genero="hombre mujer">
        <div style="position: relative;">
            @if($product->image)
                <img src="/img/{{ $product->image }}" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            @else
                <div style="width: 100%; height: 450px; background: #111; display: flex; align-items: center; justify-content: center;">
                    <span style="color: #333; letter-spacing: 3px; font-size: 0.8rem;">SIN IMAGEN</span>
                </div>
            @endif
        </div>
        <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">{{ strtoupper($product->name) }}</p>
        <p style="color: #aaa;">${{ number_format($product->price, 0, ',', '.') }}</p>
        <a href="/catalogo/{{ $product->id }}" style="color: #aaa; letter-spacing: 2px; font-size: 0.75rem; text-decoration: none;">VER DETALLE →</a>
    </div>
    @endforeach

</div>


</div>

<style>
.btn-filtro {
    background: none;
    border: 1px solid #333;
    color: #aaa;
    letter-spacing: 3px;
    font-size: 0.75rem;
    padding: 8px 20px;
    margin-right: 8px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: all 0.3s;
}
.btn-filtro:hover, .btn-filtro.activo {
    border-color: #f0f0f0;
    color: #f0f0f0;
}
</style>

<script>
function filtrar(categoria, genero) {
    const productos = document.querySelectorAll('.producto');
    const botones = document.querySelectorAll('.btn-filtro');

    botones.forEach(btn => btn.classList.remove('activo'));

    productos.forEach(producto => {
        const catMatch = categoria === 'todos' || producto.dataset.categoria === categoria;
        const genMatch = genero === 'todos' || producto.dataset.genero.includes(genero);
        
        if (catMatch && genMatch) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none';
        }
    });
}

const params = new URLSearchParams(window.location.search);
const categoriaUrl = params.get('categoria');
const generoUrl = params.get('genero');
if (categoriaUrl || generoUrl) {
    filtrar(categoriaUrl || 'todos', generoUrl || 'todos');
}
</script>

@endsection