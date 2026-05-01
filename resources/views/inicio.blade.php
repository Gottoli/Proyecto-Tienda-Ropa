@extends('layout')

@section('contenido')

{{-- HERO PANTALLA COMPLETA --}}
<div style="position: relative; width: 100%; height: 90vh; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600" 
         style="width: 100%; height: 100%; object-fit: cover;">
    <div style="position: absolute; bottom: 40px; left: 40px;">
        <a href="/catalogo" class="btn me-2" style="background: #fff; color: #000; letter-spacing: 3px; border-radius: 0; font-size: 0.8rem;">SHOP MEN</a>
        <a href="/catalogo" class="btn" style="background: #fff; color: #000; letter-spacing: 3px; border-radius: 0; font-size: 0.8rem;">SHOP WOMEN</a>
    </div>
</div>

{{-- SECCION NEW IN --}}
<div style="background: #0a0a0a; padding: 4rem 0;">
    <div style="background: #fff; padding: 12px 0; margin-bottom: 3rem;">
        <p class="text-center" style="letter-spacing: 6px; font-size: 0.9rem; color: #000; margin: 0;">NEW IN</p>
    </div>
        <div class="row g-4">
            <div class="col-md-3">
                <img src="/img/campera1.jpg" style="width: 100%; height: 500px; object-fit: cover;">
                <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CAMPERA OVERSIZE</p>
            </div>
            <div class="col-md-3">
                <img src="/img/remera1.jpg" style="width: 100%; height: 500px; object-fit: cover;">
                <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">REMERA NEGRA</p>
            </div>
            <div class="col-md-3">
                <img src="/img/pantalon1.jpeg" style="width: 100%; height: 500px; object-fit: cover;">
                <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">JEAN SLIM</p>
            </div>
            <div class="col-md-3">
                <img src="/img/buzo1.jpg" style="width: 100%; height: 500px; object-fit: cover;">
                <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">BUZO ZIP NEGRO</p>
            </div>
        </div>
</div>

{{-- CINTA DE PRODUCTOS --}}
<div style="background: #0a0a0a; padding: 4rem 0; overflow: hidden;">
    <div style="background: #fff; padding: 12px 0; margin-bottom: 3rem;">
        <p class="text-center" style="letter-spacing: 6px; font-size: 0.9rem; color: #000; margin: 0;">TAMBIÉN TE PUEDE GUSTAR</p>
    </div>
    <div style="display: flex; animation: cinta 20s linear infinite; width: max-content;">
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/campera2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CAMPERA CUERO</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/remera2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">REMERA OFF WHITE</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/buzo2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">BUZO ZIP BLANCO</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/pantalon2.jpeg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">JEAN WIDE LEG</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/campera3.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CAMPERA DENIM</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/remera3.jpeg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">REMERA BALENCIAGA</p>
        </div>
        {{-- Repetimos para que sea infinito --}}
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/campera2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CAMPERA CUERO</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/remera2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">REMERA OFF WHITE</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/buzo2.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">BUZO ZIP BLANCO</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/pantalon2.jpeg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">JEAN WIDE LEG</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/campera3.jpg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CAMPERA DENIM</p>
        </div>
        <div style="width: 400px; padding: 0 10px;">
            <img src="/img/remera3.jpeg" style="width: 100%; height: 450px; object-fit: cover;">
            <p class="mt-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">REMERA BALENCIAGA</p>
        </div>
    </div>
</div>

<style>
@keyframes cinta {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>

@endsection