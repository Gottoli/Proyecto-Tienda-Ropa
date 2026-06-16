@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin" class="is-active">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">PANEL ADMINISTRATIVO</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 2.5rem;">DASHBOARD</h2>

    {{-- Métricas --}}
    <div class="row g-3 mb-5">
        @foreach([
            ['label' => 'USUARIOS REGISTRADOS', 'valor' => $usuarios],
            ['label' => 'PRODUCTOS ACTIVOS',    'valor' => $productos],
            ['label' => 'CONSULTAS NUEVAS',     'valor' => $consultas],
            ['label' => 'ITEMS EN CARRITOS',    'valor' => $itemsCarrito],
        ] as $metric)
        <div class="col-md-3">
            <div class="lisbon-card" style="padding: 2rem; text-align: center;">
                <p style="letter-spacing: 3px; font-size: 0.68rem; color: var(--text-3); margin-bottom: 1rem;">{{ $metric['label'] }}</p>
                <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.8rem; color: var(--olive-dark); margin: 0;">{{ $metric['valor'] }}</h2>
            </div>
        </div>
        @endforeach
    </div>

    <hr class="lisbon-hr">

    {{-- Accesos --}}
    <p class="page-eyebrow" style="margin-bottom: 1.5rem;">GESTIÓN</p>
    <div class="row g-3">
        @foreach([
            ['titulo' => 'PRODUCTOS',  'desc' => 'Gestionar el catálogo de productos',    'url' => '/admin/productos',  'btn' => 'VER PRODUCTOS'],
            ['titulo' => 'CONSULTAS',  'desc' => 'Revisar mensajes de clientes',           'url' => '/admin/consultas',  'btn' => 'VER CONSULTAS'],
            ['titulo' => 'USUARIOS',   'desc' => 'Ver y administrar usuarios registrados', 'url' => '/admin/usuarios',   'btn' => 'VER USUARIOS'],
        ] as $card)
        <div class="col-md-4">
            <div class="lisbon-card" style="padding: 2rem; height: 100%;">
                <p style="letter-spacing: 4px; font-size: 0.72rem; color: var(--olive); margin-bottom: 0.5rem;">{{ $card['titulo'] }}</p>
                <p style="color: var(--text-3); font-size: 0.85rem; margin-bottom: 1.5rem;">{{ $card['desc'] }}</p>
                <a href="{{ $card['url'] }}" class="btn-lisbon">{{ $card['btn'] }}</a>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
