@extends('layout')

@section('contenido')

{{-- ── HERO ── --}}
<div style="position: relative; width: 100%; height: 92vh; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600"
         style="width: 100%; height: 100%; object-fit: cover; object-position: center top;">
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.22);"></div>

    {{-- Texto superior --}}
    <div style="position: absolute; top: 48px; left: 48px;">
        <p style="font-size: 13px; font-weight: 500; letter-spacing: 0.28em; color: rgba(255,255,255,0.6); margin: 0;">"INVIERNO 2026"</p>
    </div>

    {{-- Headline central --}}
    <div style="position: absolute; top: 50%; left: 48px; transform: translateY(-50%);">
        <h1 style="font-size: clamp(56px, 9vw, 120px); font-weight: 300; letter-spacing: 0.04em; color: #fff; line-height: 0.92; margin: 0;">
            NEW<br>COLLECTION
        </h1>
    </div>

    {{-- CTA inferior --}}
    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 0 48px 56px; display: flex; align-items: flex-end; justify-content: space-between;">
        <div class="d-flex gap-3">
            <a href="/catalogo?genero=hombre" class="btn-lisbon"
               style="border-color: rgba(255,255,255,0.5); color: #fff;">SHOP MEN</a>
            <a href="/catalogo?genero=mujer" class="btn-lisbon"
               style="border-color: rgba(255,255,255,0.5); color: #fff;">SHOP WOMEN</a>
        </div>
        <p style="font-size: 13px; letter-spacing: 0.14em; color: rgba(255,255,255,0.5); margin: 0;">
            LISBON™ — AR
        </p>
    </div>
</div>

{{-- ── "NEW IN" ── --}}
<div style="background: var(--bg-off); padding: 5rem 0;">
    <div class="container">
        <div style="display: flex; align-items: baseline; gap: 2.5rem; margin-bottom: 4rem;">
            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin: 0; white-space: nowrap;">"NEW IN"</p>
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
            <a href="/catalogo" style="font-size: 12px; font-weight: 400; letter-spacing: 0.2em; color: var(--text-3); text-decoration: none; white-space: nowrap; transition: opacity 0.15s;"
               onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">VER TODO →</a>
        </div>
        <div class="row g-0">
            @foreach([
                ['img' => 'campera1.jpg',  'nombre' => 'CAMPERA OVERSIZE'],
                ['img' => 'remera1.jpg',   'nombre' => 'REMERA CLÁSICA'],
                ['img' => 'pantalon1.jpeg','nombre' => 'JEAN SLIM'],
                ['img' => 'buzo1.jpg',     'nombre' => 'BUZO ZIP'],
            ] as $item)
            <div class="col-md-3" style="padding: 0 8px;">
                <img src="/img/{{ $item['img'] }}"
                     style="width: 100%; height: 500px; object-fit: cover; background: var(--border-sub); display: block;">
                <div style="padding: 16px 0 0;">
                    <p style="font-size: 13px; font-weight: 500; letter-spacing: 0.1em; color: var(--text); margin: 0 0 2px;">{{ $item['nombre'] }}</p>
                    <p style="font-size: 13px; color: var(--text-3); margin: 0; letter-spacing: 0.05em;">—</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ── TAMBIÉN TE PUEDE GUSTAR (cinta) ── --}}
<div style="background: var(--bg); padding: 5rem 0; overflow: hidden; border-top: 1px solid var(--border);">
    <div class="container mb-4">
        <div style="display: flex; align-items: baseline; gap: 2.5rem;">
            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin: 0; white-space: nowrap;">"TAMBIÉN TE PUEDE GUSTAR"</p>
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
        </div>
    </div>
    <div style="display: flex; animation: cinta 28s linear infinite; width: max-content; margin-top: 2.5rem;">
        @foreach([
            ['img' => 'campera2.jpg',   'nombre' => 'CAMPERA CUERO'],
            ['img' => 'remera2.jpg',    'nombre' => 'REMERA OFF WHITE'],
            ['img' => 'buzo2.jpg',      'nombre' => 'BUZO ZIP BLANCO'],
            ['img' => 'pantalon2.jpeg', 'nombre' => 'JEAN WIDE LEG'],
            ['img' => 'campera3.jpg',   'nombre' => 'CAMPERA DENIM'],
            ['img' => 'remera3.jpeg',   'nombre' => 'REMERA ESENCIAL'],
            ['img' => 'campera2.jpg',   'nombre' => 'CAMPERA CUERO'],
            ['img' => 'remera2.jpg',    'nombre' => 'REMERA OFF WHITE'],
            ['img' => 'buzo2.jpg',      'nombre' => 'BUZO ZIP BLANCO'],
            ['img' => 'pantalon2.jpeg', 'nombre' => 'JEAN WIDE LEG'],
            ['img' => 'campera3.jpg',   'nombre' => 'CAMPERA DENIM'],
            ['img' => 'remera3.jpeg',   'nombre' => 'REMERA ESENCIAL'],
        ] as $item)
        <div style="width: 340px; padding: 0 6px; flex-shrink: 0;">
            <img src="/img/{{ $item['img'] }}"
                 style="width: 100%; height: 420px; object-fit: cover; background: var(--bg-off); display: block;">
            <p style="font-size: 13px; font-weight: 500; letter-spacing: 0.1em; color: var(--text); margin: 14px 0 0;">{{ $item['nombre'] }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- ── MANIFIESTO ── --}}
<div style="background: #000; padding: 8rem 0; text-align: center;">
    <div class="container">
        <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.35em; color: rgba(255,255,255,0.35); margin-bottom: 2rem;">"FILOSOFÍA"</p>
        <h2 style="font-weight: 300; letter-spacing: 0.12em; color: #fff; font-size: clamp(36px, 5.5vw, 72px); line-height: 1.15; max-width: 700px; margin: 0 auto 2.5rem;">
            MENOS ES MÁS.
        </h2>
        <p style="color: rgba(255,255,255,0.45); letter-spacing: 0.06em; font-size: 17px; max-width: 480px; margin: 0 auto 3rem; line-height: 2;">
            Prendas atemporales diseñadas para durar.<br>Calidad sobre cantidad, siempre.
        </p>
        <a href="/quienes-somos" class="btn-lisbon"
           style="border-color: rgba(255,255,255,0.3); color: #fff;">
            NUESTRA HISTORIA →
        </a>
    </div>
</div>

{{-- ── CATEGORÍAS ── --}}
<div style="background: var(--bg); padding: 6rem 0; border-top: 1px solid var(--border);">
    <div class="container">
        <div style="display: flex; align-items: baseline; gap: 2.5rem; margin-bottom: 4rem;">
            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin: 0;">"EXPLORAR"</p>
            <hr style="flex: 1; border-color: var(--border); margin: 0;">
        </div>
        <div class="row g-0">
            <div class="col-md-6" style="padding-right: 4px;">
                <a href="/catalogo?genero=hombre" style="display: block; position: relative; overflow: hidden; text-decoration: none;">
                    <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?w=900"
                         style="width: 100%; height: 560px; object-fit: cover; display: block; transition: transform 0.5s;"
                         onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 32px; background: linear-gradient(to top, rgba(0,0,0,0.55), transparent);">
                        <p style="font-size: 13px; font-weight: 500; letter-spacing: 0.22em; color: #fff; margin: 0 0 6px;">HOMBRE</p>
                        <p style="font-size: 12px; letter-spacing: 0.15em; color: rgba(255,255,255,0.6); margin: 0;">VER COLECCIÓN →</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6" style="padding-left: 4px;">
                <a href="/catalogo?genero=mujer" style="display: block; position: relative; overflow: hidden; text-decoration: none;">
                    <img src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03?w=900"
                         style="width: 100%; height: 560px; object-fit: cover; display: block; transition: transform 0.5s;"
                         onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 32px; background: linear-gradient(to top, rgba(0,0,0,0.55), transparent);">
                        <p style="font-size: 13px; font-weight: 500; letter-spacing: 0.22em; color: #fff; margin: 0 0 6px;">MUJER</p>
                        <p style="font-size: 12px; letter-spacing: 0.15em; color: rgba(255,255,255,0.6); margin: 0;">VER COLECCIÓN →</p>
                    </div>
                </a>
            </div>
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
