@extends('layout')

@section('title', 'Cómo Comprar | LISBON™')

@section('contenido')

<div class="container py-5">
    <div class="col-md-10 mx-auto">

        <p class="page-eyebrow">INFORMACIÓN</p>
        <h2 class="page-title" style="font-size: 2.2rem; margin-bottom: 0;">COMERCIALIZACIÓN</h2>
        <hr class="lisbon-hr">

        <div class="row g-4">

            {{-- ENVÍOS --}}
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">ENVÍOS</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2; margin-bottom: 1.5rem;">
                        Realizamos envíos a todo el país. El tiempo de entrega es de 48 a 72 horas hábiles.
                    </p>
                    <p style="color: var(--olive); font-size: 0.85rem; letter-spacing: 2px;">✓ Envío gratis en compras mayores a $50.000</p>
                </div>
            </div>

            {{-- FORMAS DE PAGO --}}
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">FORMAS DE PAGO</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2; margin-bottom: 1.5rem;">
                        Aceptamos múltiples medios de pago. Hasta 12 cuotas sin interés.
                    </p>
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach(['VISA', 'MASTERCARD', 'MERCADO PAGO', 'EFECTIVO', 'TRANSFERENCIA'] as $medio)
                            <span style="border: 1px solid var(--border); padding: 6px 12px; color: var(--text-2); font-size: 0.72rem; letter-spacing: 2px;">{{ $medio }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- DEVOLUCIONES --}}
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">DEVOLUCIONES</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2; margin-bottom: 1.5rem;">
                        Tenés 30 días para realizar cambios o devoluciones. El producto debe estar sin uso y con etiquetas originales.
                    </p>
                    <p style="color: var(--olive); font-size: 0.85rem; letter-spacing: 2px;">✓ 30 días de garantía</p>
                </div>
            </div>

            {{-- RETIRO EN TIENDA --}}
            <div class="col-md-6">
                <div class="lisbon-card" style="padding: 2.5rem; height: 100%;">
                    <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.5rem;">RETIRO EN TIENDA</p>
                    <p style="color: var(--text-2); font-size: 1rem; line-height: 2; margin-bottom: 1.5rem;">
                        Podés retirar tu pedido en nuestra tienda ubicada en Av. Corrientes 1234, CABA.
                    </p>
                    <p style="color: var(--olive); font-size: 0.85rem; letter-spacing: 2px;">✓ Lunes a Sábado de 10 a 20hs</p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
