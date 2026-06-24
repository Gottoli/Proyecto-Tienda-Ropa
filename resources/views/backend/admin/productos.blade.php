@extends('layout')

@section('title', 'Productos | LISBON™')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos" class="is-active">PRODUCTOS</a>
        <a href="/admin/ventas">VENTAS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <p class="page-eyebrow">ADMIN</p>
            <h2 class="page-title" style="font-size: 2.3rem;">PRODUCTOS</h2>
        </div>
        <a href="/admin/productos/crear" class="btn-lisbon-filled" style="margin-top: 1.5rem; font-size: 14px; padding: 13px 24px;">+ NUEVO PRODUCTO</a>
    </div>

    @if(session('success'))
        <div class="lisbon-success">{{ session('success') }}</div>
    @endif

    {{-- ── Filtros y búsqueda ── --}}
    <form action="/admin/productos" method="GET" class="admin-filtros mb-4" id="filtrosProductos">
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="BUSCAR POR NOMBRE..."
               class="lisbon-input" style="font-size: 15px; flex: 2; min-width: 220px;"
               oninput="buscarConDebounce()" autocomplete="off">

        <select name="categoria" class="lisbon-input" style="font-size: 15px; flex: 1; min-width: 160px; appearance: none; cursor: pointer;" onchange="document.getElementById('filtrosProductos').submit()">
            <option value="">TODAS LAS CATEGORÍAS</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('categoria') == $category->id ? 'selected' : '' }}>
                    {{ strtoupper($category->name) }}
                </option>
            @endforeach
        </select>

        <select name="genero" class="lisbon-input" style="font-size: 15px; flex: 1; min-width: 140px; appearance: none; cursor: pointer;" onchange="document.getElementById('filtrosProductos').submit()">
            <option value="">TODOS LOS GÉNEROS</option>
            <option value="hombre" {{ request('genero') === 'hombre' ? 'selected' : '' }}>HOMBRE</option>
            <option value="mujer" {{ request('genero') === 'mujer' ? 'selected' : '' }}>MUJER</option>
            <option value="unisex" {{ request('genero') === 'unisex' ? 'selected' : '' }}>UNISEX</option>
        </select>

        <select name="estado" class="lisbon-input" style="font-size: 15px; flex: 1; min-width: 140px; appearance: none; cursor: pointer;" onchange="document.getElementById('filtrosProductos').submit()">
            <option value="">TODOS LOS ESTADOS</option>
            <option value="activo" {{ request('estado') === 'activo' ? 'selected' : '' }}>ACTIVO</option>
            <option value="inactivo" {{ request('estado') === 'inactivo' ? 'selected' : '' }}>INACTIVO</option>
        </select>

        <button type="submit" class="btn-lisbon-filled" style="font-size: 14px; padding: 13px 26px; white-space: nowrap;">BUSCAR</button>
        @if(request('buscar') || request('categoria') || request('genero') || request('estado'))
            <a href="/admin/productos" class="btn-lisbon-ghost" style="font-size: 14px; padding: 13px 22px; white-space: nowrap;">LIMPIAR</a>
        @endif
    </form>

    <script>
        let temporizadorBusqueda;
        function buscarConDebounce() {
            clearTimeout(temporizadorBusqueda);
            temporizadorBusqueda = setTimeout(function() {
                document.getElementById('filtrosProductos').submit();
            }, 450);
        }
    </script>

    <p style="font-size: 14px; color: var(--text-3); letter-spacing: 0.06em; margin-bottom: 1.5rem;">
        {{ $products->total() }} {{ $products->total() === 1 ? 'PRODUCTO ENCONTRADO' : 'PRODUCTOS ENCONTRADOS' }}
    </p>

    @if($products->isEmpty())
        <div style="border: 1px solid var(--border); padding: 4rem; text-align: center;">
            <p style="font-size: 16px; letter-spacing: 0.14em; color: var(--text-3);">NO ENCONTRAMOS PRODUCTOS CON ESOS FILTROS.</p>
        </div>
    @else
    <table class="lisbon-table" style="font-size: 16px;">
        <thead>
            <tr>
                <th style="font-size: 14px;"></th>
                <th style="font-size: 14px;">#</th>
                <th style="font-size: 14px;">NOMBRE</th>
                <th style="font-size: 14px;">CATEGORÍA</th>
                <th style="font-size: 14px;">PRECIO</th>
                <th style="font-size: 14px;">STOCK</th>
                <th style="font-size: 14px;">ESTADO</th>
                <th style="font-size: 14px;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td style="width: 64px;">
                    @if($product->image)
                        <img src="/img/{{ $product->image }}" alt="{{ $product->name }}"
                             style="width:50px; height:50px; object-fit:cover; background:var(--bg-off);">
                    @else
                        <div style="width:50px; height:50px; background:var(--bg-off); display:flex; align-items:center; justify-content:center;">
                            <span style="font-size:9px; color:var(--border); letter-spacing:0.05em;">S/IMG</span>
                        </div>
                    @endif
                </td>
                <td style="color: var(--text-3); font-size: 15px;">{{ $product->id }}</td>
                <td style="color: var(--text-1); letter-spacing: 1px; font-size: 16px;">{{ $product->name }}</td>
                <td style="font-size: 16px;">{{ $product->category->name }}</td>
                <td style="color: var(--olive); letter-spacing: 1px; font-size: 16px;">${{ number_format($product->price, 0, ',', '.') }}</td>
                <td style="font-size: 16px;">{{ $product->stock }}</td>
                <td>
                    @if($product->active)
                        <span class="badge-olive" style="font-size: 12px;">ACTIVO</span>
                    @else
                        <span class="badge-muted" style="font-size: 12px;">INACTIVO</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="/admin/productos/{{ $product->id }}/editar" class="btn-lisbon-ghost" style="font-size: 13px;">EDITAR</a>

                        @if($product->active)
                            <form action="/admin/productos/{{ $product->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-lisbon-ghost"
                                    style="color: #8A4A3A; border-color: #C4A09A; font-size: 13px;"
                                    onclick="return confirm('¿Desactivar este producto?')">
                                    DESACTIVAR
                                </button>
                            </form>
                        @else
                            <form action="/admin/productos/{{ $product->id }}/activar" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-lisbon-ghost"
                                    style="color: var(--text); border-color: var(--text); font-size: 13px;">
                                    ACTIVAR
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    @endif

</div>

<style>
.admin-filtros {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    border: 1px solid var(--border);
    padding: 18px;
    background: var(--bg-off);
}
</style>

@endsection
