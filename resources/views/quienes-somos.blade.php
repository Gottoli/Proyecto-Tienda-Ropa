@extends('layout')

@section('contenido')

{{-- HERO --}}
<div style="height: 400px; background: #111; display: flex; align-items: center; justify-content: center; flex-direction: column; border-bottom: 1px solid #222;">
    <p style="letter-spacing: 8px; color: #aaa; font-size: 1.1rem;">DESDE 2020</p>
    <h1 style="font-size: 5rem; font-weight: 300; letter-spacing: 12px; color: #f0f0f0;">LISBON</h1>
    <p style="letter-spacing: 6px; color: #555; font-size: 1.2rem;">MODA ATEMPORAL · BUENOS AIRES</p>
</div>

<div class="container py-5">
    <div class="col-md-10 mx-auto">

        {{-- HISTORIA --}}
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6">
                <p style="letter-spacing: 4px; color: #aaa; font-size: 1.2rem;">NUESTRA HISTORIA</p>
                <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.5rem;">QUIÉNES SOMOS</h2>
                <hr style="border-color: #222; margin: 2rem 0;">
                <p style="color: #aaa; font-size: 1.2rem; line-height: 2;">LISBON nació en 2020 con una visión clara: crear ropa minimalista de alta calidad para personas que valoran el estilo atemporal. Cada prenda es diseñada con materiales premium y un proceso de confección artesanal.</p>
                <p style="color: #aaa; font-size: 1.2rem; line-height: 2;">Nuestra filosofía es simple: menos es más. Creemos que la verdadera elegancia está en la simplicidad.</p>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6 text-center" style="border: 1px solid #222; padding: 2rem;">
                        <h3 style="font-size: 2.5rem; font-weight: 300; color: #fff;">+5</h3>
                        <p style="color: #aaa; letter-spacing: 3px; font-size: 1.2rem;">AÑOS</p>
                    </div>
                    <div class="col-6 text-center" style="border: 1px solid #222; padding: 2rem;">
                        <h3 style="font-size: 2.5rem; font-weight: 300; color: #fff;">+10K</h3>
                        <p style="color: #aaa; letter-spacing: 3px; font-size: 1.2rem;">CLIENTES</p>
                    </div>
                    <div class="col-6 text-center" style="border: 1px solid #222; padding: 2rem;">
                        <h3 style="font-size: 2.5rem; font-weight: 300; color: #fff;">+100</h3>
                        <p style="color: #aaa; letter-spacing: 3px; font-size: 1.2rem;">PRODUCTOS</p>
                    </div>
                    <div class="col-6 text-center" style="border: 1px solid #222; padding: 2rem;">
                        <h3 style="font-size: 2.5rem; font-weight: 300; color: #fff;">24</h3>
                        <p style="color: #aaa; letter-spacing: 3px; font-size: 1.2rem;">PROVINCIAS</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- VALORES --}}
        <hr style="border-color: #222; margin: 3rem 0;">
        <p style="letter-spacing: 4px; color: #aaa; font-size: 1.2rem; text-align: center;">NUESTROS VALORES</p>
        <div class="row g-4 mt-3 text-center">
            <div class="col-md-4" style="border: 1px solid #222; padding: 2rem;">
                <p style="font-size: 2rem;">✦</p>
                <p style="letter-spacing: 3px; font-size: 1.1rem; color: #fff;">CALIDAD</p>
                <p style="color: #aaa; font-size: 1.1rem; line-height: 2;">Materiales premium seleccionados cuidadosamente para cada prenda.</p>
            </div>
            <div class="col-md-4" style="border: 1px solid #222; padding: 2rem;">
                <p style="font-size: 2rem;">✦</p>
                <p style="letter-spacing: 3px; font-size: 1.1rem; color: #fff;">SIMPLICIDAD</p>
                <p style="color: #aaa; font-size: 1.1rem; line-height: 2;">Diseños atemporales que trascienden las tendencias pasajeras.</p>
            </div>
            <div class="col-md-4" style="border: 1px solid #222; padding: 2rem;">
                <p style="font-size: 2rem;">✦</p>
                <p style="letter-spacing: 3px; font-size: 1.1rem; color: #fff;">SUSTENTABILIDAD</p>
                <p style="color: #aaa; font-size: 1.1rem; line-height: 2;">Producción responsable y consciente con el medio ambiente.</p>
            </div>
        </div>

        {{-- EQUIPO --}}
            <hr style="border-color: #222; margin: 3rem 0;">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 1.2rem; text-align: center;">NUESTRO EQUIPO</p>
            <div class="row g-4 mt-3 text-center">
                <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 1px solid #222;">
                <p class="mt-3" style="letter-spacing: 2px; font-size: 1.1rem; color: #fff;">MARÍA GARCÍA</p>
                <p style="color: #aaa; font-size: 1.2rem; letter-spacing: 2px;">DIRECTORA CREATIVA</p>
            </div>
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 1px solid #222;">
                <p class="mt-3" style="letter-spacing: 2px; font-size: 1.1rem; color: #fff;">LUCAS TORRES</p>
                <p style="color: #aaa; font-size: 1.2rem; letter-spacing: 2px;">DIRECTOR DE OPERACIONES</p>
            </div>
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 1px solid #222;">
                <p class="mt-3" style="letter-spacing: 2px; font-size: 1.1rem; color: #fff;">ANA MARTÍNEZ</p>
                <p style="color: #aaa; font-size: 1.2rem; letter-spacing: 2px;">DISEÑADORA PRINCIPAL</p>
    <      /div>
        </div>

    </div>
</div>

@endsection