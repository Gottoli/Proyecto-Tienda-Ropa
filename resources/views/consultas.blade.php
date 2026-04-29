@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">CONTACTANOS</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">CONSULTAS</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            <form>
                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">NOMBRE</label>
                    <input type="text" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu nombre">
                </div>
                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">EMAIL</label>
                    <input type="email" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu email">
                </div>
                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">ASUNTO</label>
                    <input type="text" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Asunto">
                </div>
                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">MENSAJE</label>
                    <textarea class="form-control mt-2" rows="5" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu mensaje"></textarea>
                </div>
                <button type="submit" class="btn w-100" style="border: 1px solid #f0f0f0; color: #f0f0f0; letter-spacing: 3px; border-radius: 0;">ENVIAR</button>
            </form>
        </div>
    </div>
</div>

@endsection