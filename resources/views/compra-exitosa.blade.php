@extends('layout')

@section('title', 'Compra Exitosa | LISBON™')

@section('contenido')

<div class="container py-5" style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
    <div style="text-align: center; max-width: 480px; width: 100%;">

        <div id="loading">
            <div style="margin: 0 auto 2.5rem; width: 52px; height: 52px; border: 1px solid var(--border); border-top: 1px solid var(--olive); border-radius: 50%; animation: spin 1s linear infinite;"></div>
            <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--text-3);">PROCESANDO TU COMPRA...</p>
        </div>

        <div id="success" style="display: none;">
            <div style="width: 64px; height: 64px; border: 1px solid var(--olive); display: flex; align-items: center; justify-content: center; margin: 0 auto 2.5rem; color: var(--olive); font-size: 1.5rem;">✓</div>

            <p style="letter-spacing: 6px; font-size: 0.72rem; color: var(--olive); margin-bottom: 0.5rem;">LISBON</p>
            <h2 style="font-weight: 300; letter-spacing: 8px; color: var(--olive-dark); font-size: 2rem; margin-bottom: 1rem;">COMPRA EXITOSA</h2>
            <p style="color: var(--text-2); letter-spacing: 2px; font-size: 0.9rem; margin-bottom: 0.5rem;">Tu pedido fue procesado correctamente.</p>
            <p style="color: var(--text-3); letter-spacing: 2px; font-size: 0.8rem;">Recibirás información sobre el envío pronto.</p>

            <hr class="lisbon-hr" style="width: 160px; margin: 2.5rem auto;">

            <div class="d-flex justify-content-center gap-3">
                <a href="/cliente" class="btn-lisbon">MI CUENTA</a>
                <a href="/catalogo" class="btn-lisbon-filled">SEGUIR COMPRANDO</a>
            </div>
        </div>

    </div>
</div>

<style>
@keyframes spin {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
setTimeout(function () {
    document.getElementById('loading').style.display = 'none';
    document.getElementById('success').style.display  = 'block';
}, 2500);
</script>

@endsection
