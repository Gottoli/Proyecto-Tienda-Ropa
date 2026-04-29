@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">NUESTRA HISTORIA</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">QUIÉNES SOMOS</h2>
            <hr style="border-color: #222; margin: 2rem 0;">
            <p style="color: #aaa; line-height: 2;">LISBON nació en 2020 con una visión clara: crear ropa minimalista de alta calidad para personas que valoran el estilo atemporal. Cada prenda es diseñada con materiales premium y un proceso de confección artesanal.</p>
            <p style="color: #aaa; line-height: 2;">Nuestra filosofía es simple: menos es más. Creemos que la verdadera elegancia está en la simplicidad.</p>

            <hr style="border-color: #222; margin: 3rem 0;">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">NUESTRO EQUIPO</p>

            <div class="row g-4 mt-3">
                <div class="col-md-4 text-center">
                    <div style="width: 80px; height: 80px; background: #111; border-radius: 50%; margin: 0 auto;"></div>
                    <p class="mt-3" style="letter-spacing: 2px; font-size: 0.8rem;">MARÍA GARCÍA</p>
                    <p style="color: #555; font-size: 0.8rem;">Directora Creativa</p>
                </div>
                <div class="col-md-4 text-center">
                    <div style="width: 80px; height: 80px; background: #111; border-radius: 50%; margin: 0 auto;"></div>
                    <p class="mt-3" style="letter-spacing: 2px; font-size: 0.8rem;">LUCAS TORRES</p>
                    <p style="color: #555; font-size: 0.8rem;">Director de Operaciones</p>
                </div>
                <div class="col-md-4 text-center">
                    <div style="width: 80px; height: 80px; background: #111; border-radius: 50%; margin: 0 auto;"></div>
                    <p class="mt-3" style="letter-spacing: 2px; font-size: 0.8rem;">ANA MARTÍNEZ</p>
                    <p style="color: #555; font-size: 0.8rem;">Diseñadora Principal</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection