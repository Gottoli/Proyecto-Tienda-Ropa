@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/ventas">VENTAS</a><a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios" class="is-active">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">ADMIN</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 2.5rem;">USUARIOS</h2>

    <table class="lisbon-table">
        <thead>
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>ROL</th>
                <th style="text-align: center;">ITEMS EN CARRITO</th>
                <th>REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td style="color: var(--text-3);">{{ $usuario->id }}</td>
                <td style="color: var(--text-1); letter-spacing: 1px;">{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    @if($usuario->rol === 'admin')
                        <span class="badge-admin">ADMIN</span>
                    @else
                        <span class="badge-client">CLIENTE</span>
                    @endif
                </td>
                <td style="text-align: center;">{{ $usuario->cart_items_count }}</td>
                <td style="color: var(--text-3); font-size: 0.82rem;">{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

