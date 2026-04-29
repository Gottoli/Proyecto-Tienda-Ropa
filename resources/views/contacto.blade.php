@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">CONTACTO</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">INFORMACIÓN DE CONTACTO</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            <div class="row g-4">
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">DIRECCIÓN</p>
                    <p style="color: #555; font-size: 0.9rem;">Av. Corrientes 1234<br>Ciudad de Buenos Aires<br>Argentina</p>
                </div>
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">CONTACTO</p>
                    <p style="color: #555; font-size: 0.9rem;">Tel: +54 11 1234-5678<br>Email: info@lisbon.com<br>Lunes a Sábado 10-20hs</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection