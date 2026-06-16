@extends('layout')

@section('contenido')

{{-- HERO --}}
<div style="background: var(--olive-dark); padding: 6rem 0; display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center; border-bottom: 1px solid rgba(250,250,247,0.1);">
    <p style="letter-spacing: 8px; color: rgba(250,250,247,0.4); font-size: 0.72rem; margin-bottom: 1.5rem;">DESDE 2020</p>
    <h1 style="font-size: 5rem; font-weight: 300; letter-spacing: 14px; color: var(--cream); line-height: 1; margin-bottom: 1.5rem;">LISBON</h1>
    <p style="letter-spacing: 6px; color: rgba(250,250,247,0.45); font-size: 0.85rem;">MODA ATEMPORAL · BUENOS AIRES</p>
</div>

<div class="container py-5">
    <div class="col-md-10 mx-auto">

        {{-- HISTORIA --}}
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6">
                <p class="page-eyebrow">NUESTRA HISTORIA</p>
                <h2 class="page-title" style="font-size: 2rem; margin-bottom: 1.5rem;">QUIÉNES SOMOS</h2>
                <hr class="lisbon-hr" style="margin-top: 0;">
                <p style="color: var(--text-2); font-size: 1rem; line-height: 2; margin-bottom: 1.5rem;">
                    LISBON nació en 2020 con una visión clara: crear ropa minimalista de alta calidad para personas que valoran el estilo atemporal. Cada prenda es diseñada con materiales premium y un proceso de confección artesanal.
                </p>
                <p style="color: var(--text-2); font-size: 1rem; line-height: 2;">
                    Nuestra filosofía es simple: menos es más. Creemos que la verdadera elegancia está en la simplicidad.
                </p>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    @foreach(['+5' => 'AÑOS', '+10K' => 'CLIENTES', '+100' => 'PRODUCTOS', '24' => 'PROVINCIAS'] as $num => $label)
                    <div class="col-6">
                        <div class="lisbon-card text-center" style="padding: 2rem;">
                            <h3 style="font-size: 2.2rem; font-weight: 300; color: var(--olive-dark); margin-bottom: 0.5rem;">{{ $num }}</h3>
                            <p style="color: var(--text-3); letter-spacing: 4px; font-size: 0.72rem; margin: 0;">{{ $label }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <hr class="lisbon-hr">

        {{-- VALORES --}}
        <p class="page-eyebrow text-center" style="margin-bottom: 2.5rem;">NUESTROS VALORES</p>
        <div class="row g-4 mb-5">
            @foreach([
                ['título' => 'CALIDAD',         'texto' => 'Materiales premium seleccionados cuidadosamente para cada prenda.'],
                ['título' => 'SIMPLICIDAD',      'texto' => 'Diseños atemporales que trascienden las tendencias pasajeras.'],
                ['título' => 'SUSTENTABILIDAD',  'texto' => 'Producción responsable y consciente con el medio ambiente.'],
            ] as $valor)
            <div class="col-md-4">
                <div class="lisbon-card text-center" style="padding: 2.5rem; height: 100%;">
                    <p style="font-size: 1.4rem; color: var(--olive); margin-bottom: 1rem;">✦</p>
                    <p style="letter-spacing: 4px; font-size: 0.8rem; color: var(--olive-dark); margin-bottom: 1rem;">{{ $valor['título'] }}</p>
                    <p style="color: var(--text-2); font-size: 0.95rem; line-height: 1.9;">{{ $valor['texto'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <hr class="lisbon-hr">

        {{-- EQUIPO --}}
        <p class="page-eyebrow text-center" style="margin-bottom: 2.5rem;">NUESTRO EQUIPO</p>
        <div class="row g-4 text-center">
            @foreach([
                ['foto' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300', 'nombre' => 'MARÍA GARCÍA',    'rol' => 'DIRECTORA CREATIVA'],
                ['foto' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300',  'nombre' => 'LUCAS TORRES',    'rol' => 'DIRECTOR DE OPERACIONES'],
                ['foto' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300','nombre' => 'ANA MARTÍNEZ',   'rol' => 'DISEÑADORA PRINCIPAL'],
            ] as $miembro)
            <div class="col-md-4">
                <img src="{{ $miembro['foto'] }}" alt="{{ $miembro['nombre'] }}"
                     style="width: 140px; height: 140px; object-fit: cover; border: 1px solid var(--border); display: block; margin: 0 auto 1.5rem;">
                <p style="letter-spacing: 3px; font-size: 0.85rem; color: var(--olive-dark); margin-bottom: 0.4rem;">{{ $miembro['nombre'] }}</p>
                <p style="color: var(--text-3); font-size: 0.72rem; letter-spacing: 3px;">{{ $miembro['rol'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
