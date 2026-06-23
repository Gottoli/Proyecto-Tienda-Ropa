@extends('layout')

@section('title', 'Consultas | LISBON™')

@section('contenido')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <p class="page-eyebrow">CONTACTANOS</p>
            <h2 class="page-title" style="font-size: 2rem; margin-bottom: 0;">CONSULTAS</h2>
            <hr class="lisbon-hr">

            @if(session('success'))
                <div class="lisbon-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="lisbon-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="/consultas" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="lisbon-label">NOMBRE</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="lisbon-input" placeholder="Tu nombre">
                    @error('nombre') <small style="color: #8A4A3A; font-size: 0.78rem; letter-spacing: 1px;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="lisbon-label">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="lisbon-input" placeholder="Tu email">
                    @error('email') <small style="color: #8A4A3A; font-size: 0.78rem; letter-spacing: 1px;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="lisbon-label">MOTIVO</label>
                    <input type="text" name="motivo" value="{{ old('motivo') }}" class="lisbon-input" placeholder="Motivo de tu consulta">
                    @error('motivo') <small style="color: #8A4A3A; font-size: 0.78rem; letter-spacing: 1px;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-5">
                    <label class="lisbon-label">MENSAJE</label>
                    <textarea name="consulta" rows="5" class="lisbon-input" style="height: auto; resize: vertical;"
                        placeholder="Escribí tu consulta aquí">{{ old('consulta') }}</textarea>
                    @error('consulta') <small style="color: #8A4A3A; font-size: 0.78rem; letter-spacing: 1px;">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 14px;">ENVIAR CONSULTA</button>
            </form>

        </div>
    </div>
</div>

@endsection
