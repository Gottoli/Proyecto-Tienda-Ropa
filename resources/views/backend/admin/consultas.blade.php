@extends('layout')

@section('title', 'Consultas | LISBON™')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/ventas">VENTAS</a>
        <a href="/admin/consultas" class="is-active">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">ADMIN</p>
    <h2 class="page-title" style="font-size: 2.3rem; margin-bottom: 2.5rem;">CONSULTAS</h2>

    @if(session('success'))
        <div class="lisbon-success">{{ session('success') }}</div>
    @endif

    @if($consultas->isEmpty())
        <p style="color: var(--text-3); letter-spacing: 3px; font-size: 1rem; margin-top: 2rem;">NO HAY CONSULTAS AÚN.</p>
    @else
        <table class="lisbon-table" style="font-size: 16px;">
            <thead>
                <tr>
                    <th style="font-size: 14px;">#</th>
                    <th style="font-size: 14px;">NOMBRE</th>
                    <th style="font-size: 14px;">EMAIL</th>
                    <th style="font-size: 14px;">MOTIVO</th>
                    <th style="font-size: 14px;">CONSULTA</th>
                    <th style="font-size: 14px;">FECHA</th>
                    <th style="font-size: 14px;">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr style="{{ !$consulta->leida ? 'border-left: 2px solid var(--olive);' : '' }}">
                    <td style="color: var(--text-3); font-size: 15px;">{{ $consulta->id }}</td>
                    <td style="color: var(--text-1); letter-spacing: 1px; font-size: 16px;">{{ $consulta->nombre }}</td>
                    <td style="font-size: 15px;">{{ $consulta->email }}</td>
                    <td style="letter-spacing: 1px; font-size: 16px;">{{ $consulta->motivo }}</td>
                    <td style="max-width: 240px; color: var(--text-3); font-size: 15px;">{{ Str::limit($consulta->consulta, 70) }}</td>
                    <td style="color: var(--text-3); white-space: nowrap; font-size: 14px;">{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($consulta->leida)
                            <span class="badge-muted" style="font-size: 12px;">LEÍDA</span>
                        @else
                            <span class="badge-warm" style="font-size: 12px;">NUEVA</span>
                        @endif
                    </td>
                    <td>
                        @if(!$consulta->leida)
                            <form action="/admin/consultas/{{ $consulta->id }}/leer" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-lisbon-ghost" style="white-space: nowrap; font-size: 13px;">MARCAR LEÍDA</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>

@endsection
