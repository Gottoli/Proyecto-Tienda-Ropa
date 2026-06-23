@extends('layout')

@section('title', 'Contacto | LISBON™')

@section('contenido')

{{-- HERO MARCA --}}
<div style="background: var(--olive); padding: 5rem 0; text-align: center;">
    <p style="letter-spacing: 8px; font-size: 0.72rem; color: rgba(250,250,247,0.5); margin-bottom: 1.5rem;">DESDE 2020</p>
    <h1 style="font-size: 5rem; font-weight: 300; letter-spacing: 14px; color: var(--cream); line-height: 1;">LISBON</h1>
    <p style="letter-spacing: 6px; color: rgba(250,250,247,0.5); font-size: 0.85rem; margin-top: 1.5rem;">MODA ATEMPORAL</p>
</div>

<div class="container py-5">
    <div class="col-md-10 mx-auto">

        <p class="page-eyebrow">CONTACTO</p>
        <h2 class="page-title" style="font-size: 2rem; margin-bottom: 0;">INFORMACIÓN DE CONTACTO</h2>
        <hr class="lisbon-hr">

        <div class="row g-4">
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">DIRECCIÓN</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2.2;">
                        Av. Corrientes 1234<br>
                        Ciudad de Buenos Aires<br>
                        Argentina
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">CONTACTO DIRECTO</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2.2;">
                        Tel: +54 11 1234-5678<br>
                        Email: info@lisbon.com<br>
                        Lunes a Sábado 10–20hs
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">REDES SOCIALES</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2.2;">
                        Instagram: @lisbon.store<br>
                        Facebook: /lisbonstore<br>
                        TikTok: @lisbon.oficial
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">HORARIOS</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2.2;">
                        Lunes a Viernes: 10 a 20hs<br>
                        Sábados: 10 a 18hs<br>
                        Domingos: Cerrado
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
