@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">INFORMACIÓN</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">COMERCIALIZACIÓN</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            <div class="row g-4">
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">ENVÍOS</p>
                    <p style="color: #555; font-size: 0.9rem; line-height: 2;">Realizamos envíos a todo el país. El tiempo de entrega es de 48 a 72 horas hábiles. Envío gratis en compras mayores a $50.000.</p>
                </div>
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">FORMAS DE PAGO</p>
                    <p style="color: #555; font-size: 0.9rem; line-height: 2;">Aceptamos tarjetas de crédito y débito, transferencia bancaria y Mercado Pago. Hasta 12 cuotas sin interés.</p>
                </div>
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">DEVOLUCIONES</p>
                    <p style="color: #555; font-size: 0.9rem; line-height: 2;">Tenés 30 días para realizar cambios o devoluciones. El producto debe estar sin uso y con etiquetas originales.</p>
                </div>
                <div class="col-md-6">
                    <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">RETIRO EN TIENDA</p>
                    <p style="color: #555; font-size: 0.9rem; line-height: 2;">Podés retirar tu pedido en nuestra tienda ubicada en Av. Corrientes 1234, CABA. Lunes a sábado de 10 a 20hs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection