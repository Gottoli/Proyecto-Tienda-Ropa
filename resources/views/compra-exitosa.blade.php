@extends('layout')

@section('contenido')

<div class="container py-5 text-center">
    
    <div id="loading" style="display: block;">
        <div style="margin: 5rem auto; width: 60px; height: 60px; border: 2px solid #333; border-top: 2px solid #fff; border-radius: 50%; animation: spin 1s linear infinite;"></div>
        <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa; margin-top: 2rem;">PROCESANDO TU COMPRA...</p>
    </div>

    <div id="success" style="display: none;">
        <div style="font-size: 4rem; margin-bottom: 2rem;">✓</div>
        <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">LISBON</p>
        <h2 style="font-weight: 300; letter-spacing: 6px; margin-bottom: 1rem;">COMPRA EXITOSA</h2>
        <p style="color: #aaa; letter-spacing: 2px; font-size: 0.9rem;">Tu pedido fue procesado correctamente.</p>
        <p style="color: #555; letter-spacing: 2px; font-size: 0.8rem;">Recibirás información sobre el envío pronto.</p>

        <hr style="border-color: #222; margin: 3rem auto; width: 200px;">

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/cliente" style="border: 1px solid #fff; color: #fff; padding: 12px 32px; letter-spacing: 3px; font-size: 0.75rem; text-decoration: none;">MI CUENTA</a>
            <a href="/catalogo" style="background: #fff; color: #000; padding: 12px 32px; letter-spacing: 3px; font-size: 0.75rem; text-decoration: none;">SEGUIR COMPRANDO</a>
        </div>
    </div>

</div>

<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
    setTimeout(function() {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('success').style.display = 'block';
    }, 2500);
</script>

@endsection