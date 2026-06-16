@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="col-md-8 mx-auto">

        <p class="page-eyebrow">LEGAL</p>
        <h2 class="page-title" style="font-size: 2rem; margin-bottom: 0;">TÉRMINOS Y USOS</h2>
        <hr class="lisbon-hr">

        @foreach([
            ['num' => '1', 'titulo' => 'USO DEL SITIO',
             'texto' => 'El uso de este sitio web implica la aceptación de los presentes términos y condiciones. LISBON se reserva el derecho de modificar estos términos en cualquier momento.'],
            ['num' => '2', 'titulo' => 'PRIVACIDAD',
             'texto' => 'Los datos personales recopilados serán utilizados únicamente para procesar pedidos y mejorar la experiencia del usuario. No compartimos información con terceros.'],
            ['num' => '3', 'titulo' => 'GARANTÍAS',
             'texto' => 'Todos nuestros productos cuentan con garantía de 6 meses por defectos de fabricación. No incluye daños por mal uso.'],
            ['num' => '4', 'titulo' => 'PROPIEDAD INTELECTUAL',
             'texto' => 'Todo el contenido de este sitio, incluyendo imágenes, textos y diseños, es propiedad de LISBON y está protegido por las leyes de propiedad intelectual.'],
        ] as $item)
        <div style="margin-bottom: 2.5rem;">
            <p style="letter-spacing: 4px; font-size: 0.72rem; color: var(--olive); margin-bottom: 0.75rem;">{{ $item['num'] }}. {{ $item['titulo'] }}</p>
            <p style="color: var(--text-2); font-size: 0.95rem; line-height: 2;">{{ $item['texto'] }}</p>
        </div>
        @endforeach

    </div>
</div>

@endsection
