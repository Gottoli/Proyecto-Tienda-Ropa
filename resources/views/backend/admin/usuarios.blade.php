@extends('layout')

@section('title', 'Usuarios | LISBON™')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/ventas">VENTAS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios" class="is-active">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">ADMIN</p>
    <h2 class="page-title" style="font-size: 2.3rem; margin-bottom: 2.5rem;">USUARIOS</h2>

    <table class="lisbon-table" style="font-size: 16px;">
        <thead>
            <tr>
                <th style="font-size: 14px;">#</th>
                <th style="font-size: 14px;">NOMBRE</th>
                <th style="font-size: 14px;">EMAIL</th>
                <th style="font-size: 14px;">ROL</th>
                <th style="text-align: center; font-size: 14px;">ITEMS EN CARRITO</th>
                <th style="font-size: 14px;">REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td style="color: var(--text-3); font-size: 15px;">{{ $usuario->id }}</td>
                <td style="color: var(--text-1); letter-spacing: 1px; font-size: 16px;">{{ $usuario->name }}</td>
                <td style="font-size: 16px;">{{ $usuario->email }}</td>
                <td>
                    @if($usuario->rol === 'admin')
                        <span class="badge-admin" style="font-size: 12px;">ADMIN</span>
                    @else
                        <span class="badge-client" style="font-size: 12px;">CLIENTE</span>
                    @endif
                </td>
                <td style="text-align: center; font-size: 16px;">{{ $usuario->cart_items_count }}</td>
                <td style="color: var(--text-3); font-size: 14px;">{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

