@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.9rem;">INFORMACIÓN</p>
            <h2 style="font-weight: 300; letter-spacing: 4px; font-size: 2.5rem;">COMERCIALIZACIÓN</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            <div class="row g-4">

                {{-- ENVÍOS --}}
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem; height: 100%;">
                        <p style="font-size: 2.5rem; margin-bottom: 1rem;">🚚</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">ENVÍOS</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Realizamos envíos a todo el país. El tiempo de entrega es de 48 a 72 horas hábiles.</p>
                        <p style="color: #f0f0f0; font-size: 1rem; letter-spacing: 2px; margin-top: 1rem;">✓ Envío gratis en compras mayores a $50.000</p>
                    </div>
                </div>

                {{-- FORMAS DE PAGO --}}
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem; height: 100%;">
                        <p style="font-size: 2.5rem; margin-bottom: 1rem;">💳</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">FORMAS DE PAGO</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Aceptamos múltiples medios de pago. Hasta 12 cuotas sin interés.</p>
                        <div class="d-flex gap-3 mt-3 flex-wrap">
                            <span style="border: 1px solid #333; padding: 8px 16px; color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">💳 VISA</span>
                            <span style="border: 1px solid #333; padding: 8px 16px; color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">💳 MASTERCARD</span>
                            <span style="border: 1px solid #333; padding: 8px 16px; color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">🔵 MERCADO PAGO</span>
                            <span style="border: 1px solid #333; padding: 8px 16px; color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">💵 EFECTIVO</span>
                            <span style="border: 1px solid #333; padding: 8px 16px; color: #aaa; font-size: 0.8rem; letter-spacing: 2px;">🏦 TRANSFERENCIA</span>
                        </div>
                    </div>
                </div>

                {{-- DEVOLUCIONES --}}
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem; height: 100%;">
                        <p style="font-size: 2.5rem; margin-bottom: 1rem;">🔄</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">DEVOLUCIONES</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Tenés 30 días para realizar cambios o devoluciones. El producto debe estar sin uso y con etiquetas originales.</p>
                        <p style="color: #f0f0f0; font-size: 1rem; letter-spacing: 2px; margin-top: 1rem;">✓ 30 días de garantía</p>
                    </div>
                </div>

                {{-- RETIRO EN TIENDA --}}
                <div class="col-md-6">
                    <div style="border: 1px solid #222; padding: 2rem; height: 100%;">
                        <p style="font-size: 2.5rem; margin-bottom: 1rem;">🏪</p>
                        <p style="letter-spacing: 3px; font-size: 0.9rem; color: #fff; margin-bottom: 1rem;">RETIRO EN TIENDA</p>
                        <p style="color: #aaa; font-size: 1rem; line-height: 2;">Podés retirar tu pedido en nuestra tienda ubicada en Av. Corrientes 1234, CABA.</p>
                        <p style="color: #f0f0f0; font-size: 1rem; letter-spacing: 2px; margin-top: 1rem;">✓ Lunes a Sábado de 10 a 20hs</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection