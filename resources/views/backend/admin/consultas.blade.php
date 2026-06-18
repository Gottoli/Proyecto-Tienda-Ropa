@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/consultas" class="is-active">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">ADMIN</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 2.5rem;">CONSULTAS</h2>

    @if(session('success'))
        <div class="lisbon-success">{{ session('success') }}</div>
    @endif

    @if($consultas->isEmpty())
        <p style="color: var(--text-3); letter-spacing: 3px; font-size: 0.85rem; margin-top: 2rem;">NO HAY CONSULTAS AÚN.</p>
    @else
        <table class="lisbon-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>MOTIVO</th>
                    <th>CONSULTA</th>
                    <th>FECHA</th>
                    <th>ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr style="{{ !$consulta->leida ? 'border-left: 2px solid var(--olive);' : '' }}">
                    <td style="color: var(--text-3);">{{ $consulta->id }}</td>
                    <td style="color: var(--text-1); letter-spacing: 1px;">{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td style="letter-spacing: 1px;">{{ $consulta->motivo }}</td>
                    <td style="max-width: 240px; color: var(--text-3);">{{ Str::limit($consulta->consulta, 70) }}</td>
                    <td style="color: var(--text-3); white-space: nowrap; font-size: 0.8rem;">{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($consulta->leida)
                            <span class="badge-muted">LEÍDA</span>
                        @else
                            <span class="badge-warm">NUEVA</span>
                        @endif
                    </td>
                    <td>
                        @if(!$consulta->leida)
                            <form action="/admin/consultas/{{ $consulta->id }}/leer" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-lisbon-ghost" style="white-space: nowrap;">MARCAR LEÍDA</button>
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
