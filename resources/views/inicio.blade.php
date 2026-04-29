@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">NUEVA COLECCIÓN 2026</p>
            <h1 style="font-size: 4rem; font-weight: 300; letter-spacing: 4px;">LISBON</h1>
            <p style="color: #aaa; line-height: 1.8;">Ropa minimalista para quienes valoran la calidad y el estilo atemporal. Cada prenda es una declaración de elegancia.</p>
            <a href="/catalogo" class="btn mt-3" style="border: 1px solid #f0f0f0; color: #f0f0f0; letter-spacing: 3px; border-radius: 0;">VER COLECCIÓN</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="/img/Gemini_Generated_Image_vbanc9vbanc9vban.png" style="width: 100%; height: 500px; object-fit: contain; background: #f5f5f0;">
        </div>
    </div>

    <hr style="border-color: #222; margin: 5rem 0;">

    <div class="row text-center g-4">
        <div class="col-md-4">
            <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">ENVÍOS</p>
            <p style="color: #555; font-size: 0.9rem;">Envíos a todo el país en 48hs</p>
        </div>
        <div class="col-md-4">
            <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">CALIDAD</p>
            <p style="color: #555; font-size: 0.9rem;">Materiales premium seleccionados</p>
        </div>
        <div class="col-md-4">
            <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">DEVOLUCIONES</p>
            <p style="color: #555; font-size: 0.9rem;">30 días para cambios y devoluciones</p>
        </div>
    </div>
</div>

@endsection