@extends('layout')

@section('contenido')

<div style="min-height: 75vh; display: flex; align-items: center; background: var(--bone);">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <div style="background: var(--cream); border: 1px solid var(--border); padding: 3rem;">

                    <p class="page-eyebrow text-center" style="margin-bottom: 0.4rem;">BIENVENIDO</p>
                    <h2 class="page-title text-center" style="font-size: 1.7rem; margin-bottom: 2.5rem;">INICIAR SESIÓN</h2>

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

                    <form action="/autenticar" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="lisbon-label">CORREO ELECTRÓNICO</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="lisbon-input">
                        </div>

                        <div class="mb-5">
                            <label class="lisbon-label">CONTRASEÑA</label>
                            <input type="password" name="password" class="lisbon-input">
                        </div>

                        <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 14px;">
                            INICIAR SESIÓN
                        </button>
                    </form>

                    <hr class="lisbon-hr">

                    <p style="color: var(--text-3); font-size: 0.82rem; text-align: center; letter-spacing: 1px; margin: 0;">
                        ¿No tenés cuenta?
                        <a href="/registro" style="color: var(--olive); letter-spacing: 2px; text-decoration: none;">REGISTRATE</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
