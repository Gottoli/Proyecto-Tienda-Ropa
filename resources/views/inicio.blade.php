@extends('layout')

@section('contenido')

{{-- HERO PANTALLA COMPLETA --}}
<div style="position: relative; width: 100%; height: 90vh; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600"
         style="width: 100%; height: 100%; object-fit: cover;">
    <div style="position: absolute; inset: 0; background: rgba(26,24,20,0.15);"></div>
    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 0 40px 50px;">
        <p style="letter-spacing: 8px; font-size: 0.72rem; color: rgba(250,250,247,0.7); margin-bottom: 1.5rem;">INVIERNO 2026 — NUEVA COLECCIÓN</p>
        <div class="d-flex gap-3">
            <a href="/catalogo?genero=hombre" class="btn-lisbon" style="border-color: rgba(250,250,247,0.7); color: #FAFAF7;">SHOP MEN</a>
            <a href="/catalogo?genero=mujer" class="btn-lisbon" style="border-color: rgba(250,250,247,0.7); color: #FAFAF7;">SHOP WOMEN</a>
        </div>
    </div>
</div>

{{-- NEW IN --}}
<div style="background: var(--bone); padding: 5rem 0;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 2rem; margin-bottom: 3.5rem;">
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
            <p style="letter-spacing: 8px; font-size: 0.72rem; color: var(--olive); margin: 0; white-space: nowrap;">NEW IN</p>
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <img src="/img/campera1.jpg" style="width: 100%; height: 480px; object-fit: cover; background: var(--bone);">
                <p class="mt-3" style="letter-spacing: 3px; font-size: 0.72rem; color: var(--text-2);">CAMPERA OVERSIZE</p>
            </div>
            <div class="col-md-3">
                <img src="/img/remera1.jpg" style="width: 100%; height: 480px; object-fit: cover; background: var(--bone);">
                <p class="mt-3" style="letter-spacing: 3px; font-size: 0.72rem; color: var(--text-2);">REMERA CLÁSICA</p>
            </div>
            <div class="col-md-3">
                <img src="/img/pantalon1.jpeg" style="width: 100%; height: 480px; object-fit: cover; background: var(--bone);">
                <p class="mt-3" style="letter-spacing: 3px; font-size: 0.72rem; color: var(--text-2);">JEAN SLIM</p>
            </div>
            <div class="col-md-3">
                <img src="/img/buzo1.jpg" style="width: 100%; height: 480px; object-fit: cover; background: var(--bone);">
                <p class="mt-3" style="letter-spacing: 3px; font-size: 0.72rem; color: var(--text-2);">BUZO ZIP</p>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="/catalogo" class="btn-lisbon">VER COLECCIÓN COMPLETA</a>
        </div>
    </div>
</div>

{{-- CINTA ANIMADA --}}
<div style="background: var(--cream); padding: 5rem 0; overflow: hidden; border-top: 1px solid var(--border);">
    <div class="container mb-4">
        <div style="display: flex; align-items: center; gap: 2rem;">
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
            <p style="letter-spacing: 8px; font-size: 0.72rem; color: var(--olive); margin: 0; white-space: nowrap;">TAMBIÉN TE PUEDE GUSTAR</p>
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
        </div>
    </div>
    <div style="display: flex; animation: cinta 24s linear infinite; width: max-content;">
        @foreach([
            ['img' => 'campera2.jpg',  'nombre' => 'CAMPERA CUERO'],
            ['img' => 'remera2.jpg',   'nombre' => 'REMERA OFF WHITE'],
            ['img' => 'buzo2.jpg',     'nombre' => 'BUZO ZIP BLANCO'],
            ['img' => 'pantalon2.jpeg','nombre' => 'JEAN WIDE LEG'],
            ['img' => 'campera3.jpg',  'nombre' => 'CAMPERA DENIM'],
            ['img' => 'remera3.jpeg',  'nombre' => 'REMERA ESENCIAL'],
            ['img' => 'campera2.jpg',  'nombre' => 'CAMPERA CUERO'],
            ['img' => 'remera2.jpg',   'nombre' => 'REMERA OFF WHITE'],
            ['img' => 'buzo2.jpg',     'nombre' => 'BUZO ZIP BLANCO'],
            ['img' => 'pantalon2.jpeg','nombre' => 'JEAN WIDE LEG'],
            ['img' => 'campera3.jpg',  'nombre' => 'CAMPERA DENIM'],
            ['img' => 'remera3.jpeg',  'nombre' => 'REMERA ESENCIAL'],
        ] as $item)
        <div style="width: 380px; padding: 0 12px; flex-shrink: 0;">
            <img src="/img/{{ $item['img'] }}" style="width: 100%; height: 440px; object-fit: cover; background: var(--bone);">
            <p class="mt-3" style="letter-spacing: 3px; font-size: 0.72rem; color: var(--text-2);">{{ $item['nombre'] }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- MANIFIESTO --}}
<div style="background: var(--olive); padding: 6rem 0; text-align: center;">
    <div class="container">
        <p style="letter-spacing: 6px; font-size: 0.72rem; color: rgba(250,250,247,0.5); margin-bottom: 1.5rem;">FILOSOFÍA</p>
        <h2 style="font-weight: 300; letter-spacing: 8px; color: var(--cream); font-size: 2.2rem; line-height: 1.5;">MENOS ES MÁS</h2>
        <p style="color: rgba(250,250,247,0.65); letter-spacing: 2px; font-size: 1rem; margin-top: 1.5rem; max-width: 500px; margin-left: auto; margin-right: auto; line-height: 2;">
            Prendas atemporales diseñadas para durar. Calidad sobre cantidad, siempre.
        </p>
        <div class="mt-4">
            <a href="/quienes-somos" class="btn-lisbon" style="border-color: rgba(250,250,247,0.4); color: var(--cream);">NUESTRA HISTORIA</a>
        </div>
    </div>
</div>

<style>
@keyframes cinta {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>

@endsection
