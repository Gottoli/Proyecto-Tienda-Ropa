@extends('layout')

@section('contenido')

{{-- CARRUSEL MARCA --}}
<div id="carruselContacto" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div style="height: 400px; background: #111; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <h1 style="font-size: 5rem; font-weight: 300; letter-spacing: 12px; color: #f0f0f0;">LISBON</h1>
                <p style="letter-spacing: 6px; color: #aaa; font-size: 0.9rem;">MODA ATEMPORAL</p>
            </div>
        </div>
        <div class="carousel-item">
            <div style="height: 400px; background: #0d0d0d; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <p style="letter-spacing: 8px; color: #aaa; font-size: 0.9rem;">NUEVA COLECCIÓN</p>
                <h1 style="font-size: 4rem; font-weight: 300; letter-spacing: 8px; color: #f0f0f0;">INVIERNO 2026</h1>
                <p style="letter-spacing: 4px; color: #555; font-size: 0.8rem; margin-top: 1rem;">DISPONIBLE AHORA</p>
            </div>
        </div>
        <div class="carousel-item">
            <div style="height: 400px; background: #111; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <p style="letter-spacing: 8px; color: #aaa; font-size: 0.9rem;">ENVÍOS A TODO EL PAÍS</p>
                <h1 style="font-size: 3rem; font-weight: 300; letter-spacing: 6px; color: #f0f0f0;">48 / 72 HRS</h1>
                <p style="letter-spacing: 4px; color: #555; font-size: 0.8rem; margin-top: 1rem;">GRATIS EN COMPRAS +$50.000</p>
            </div>
        </div>
    </div>
</div>

{{-- INFO CONTACTO --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.9rem;">CONTACTO</p>
            <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.5rem;">INFORMACIÓN DE CONTACTO</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            <div class="row g-4">
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem;">
                        <p style="font-size: 2rem; margin-bottom: 1rem;">📍</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">DIRECCIÓN</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Av. Corrientes 1234<br>Ciudad de Buenos Aires<br>Argentina</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem;">
                        <p style="font-size: 2rem; margin-bottom: 1rem;">📞</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">CONTACTO DIRECTO</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Tel: +54 11 1234-5678<br>Email: info@lisbon.com<br>Lunes a Sábado 10-20hs</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem;">
                        <p style="font-size: 2rem; margin-bottom: 1rem;">📱</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">REDES SOCIALES</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Instagram: @lisbon.store<br>Facebook: /lisbonstore<br>TikTok: @lisbon.oficial</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem;">
                        <p style="font-size: 2rem; margin-bottom: 1rem;">⏰</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">HORARIOS</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Lunes a Viernes: 10 a 20hs<br>Sábados: 10 a 18hs<br>Domingos: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection