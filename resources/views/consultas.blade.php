@extends('layout')

@section('contenido')

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <p style="letter-spacing: 4px; color: #aaa; font-size: 0.8rem;">CONTACTANOS</p>
            <h2 style="font-weight: 300; letter-spacing: 4px;">CONSULTAS</h2>
            <hr style="border-color: #222; margin: 2rem 0;">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div style="border: 1px solid #2a2; color: #afa; padding: 12px 20px; margin-bottom: 2rem; letter-spacing: 2px; font-size: 0.85rem;">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Errores generales --}}
            @if($errors->any())
                <div style="border: 1px solid #a22; color: #faa; padding: 12px 20px; margin-bottom: 2rem; font-size: 0.85rem;">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/consultas" method="POST">
                @csrf

                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">NOMBRE</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu nombre">
                    @error('nombre') <small style="color: #faa;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu email">
                    @error('email') <small style="color: #faa;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">MOTIVO</label>
                    <input type="text" name="motivo" value="{{ old('motivo') }}" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Motivo de tu consulta">
                    @error('motivo') <small style="color: #faa;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CONSULTA</label>
                    <textarea name="consulta" rows="5" class="form-control mt-2" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;" placeholder="Tu consulta">{{ old('consulta') }}</textarea>
                    @error('consulta') <small style="color: #faa;">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn w-100" style="border: 1px solid #f0f0f0; color: #f0f0f0; letter-spacing: 3px; border-radius: 0;">ENVIAR</button>
            </form>
        </div>
    </div>
</div>

@endsection