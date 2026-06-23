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

    <table class="lisbon-table" style="font-size: 16px;">
        <thead>
            <tr>
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

</div>

@endsection
