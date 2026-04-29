<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISBON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; color: #f0f0f0; font-family: 'Georgia', serif; }
        .navbar { background-color: #0a0a0a !important; border-bottom: 1px solid #222; }
        .navbar-brand { font-size: 1.8rem; letter-spacing: 8px; color: #f0f0f0 !important; }
        .nav-link { color: #aaa !important; letter-spacing: 2px; font-size: 0.8rem; }
        .nav-link:hover { color: #fff !important; }
        footer { background-color: #0a0a0a; border-top: 1px solid #222; color: #555; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">LISBON</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">INICIO</a>
                <a class="nav-link" href="/quienes-somos">NOSOTROS</a>
                <a class="nav-link" href="/catalogo">CATÁLOGO</a>
                <a class="nav-link" href="/comercializacion">COMPRAS</a>
                <a class="nav-link" href="/contacto">CONTACTO</a>
                <a class="nav-link" href="/consultas">CONSULTAS</a>
                <a class="nav-link" href="/terminos">TÉRMINOS</a>
            </div>
        </div>
    </div>
</nav>

@yield('contenido')

<footer class="py-5 mt-5" style="border-top: 1px solid #222;">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4" style="border-right: 1px solid #222;">
                <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">📦 ENVIAMOS TU COMPRA</p>
                <p style="color: #555; font-size: 0.8rem;">Entregas a todo el país</p>
            </div>
            <div class="col-md-4" style="border-right: 1px solid #222;">
                <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">💳 PAGÁ COMO QUIERAS</p>
                <p style="color: #555; font-size: 0.8rem;">Tarjetas, transferencia y Mercado Pago</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 3px; font-size: 0.8rem; color: #aaa;">🔒 COMPRÁ CON SEGURIDAD</p>
                <p style="color: #555; font-size: 0.8rem;">Tus datos siempre protegidos</p>
            </div>
        </div>

        <hr style="border-color: #222;">

        <div class="row mt-4">
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">NAVEGACIÓN</p>
                <p><a href="/" style="color: #555; text-decoration: none; font-size: 0.8rem;">Inicio</a></p>
                <p><a href="/catalogo" style="color: #555; text-decoration: none; font-size: 0.8rem;">Catálogo</a></p>
                <p><a href="/quienes-somos" style="color: #555; text-decoration: none; font-size: 0.8rem;">Quiénes Somos</a></p>
                <p><a href="/contacto" style="color: #555; text-decoration: none; font-size: 0.8rem;">Contacto</a></p>
                <p><a href="/terminos" style="color: #555; text-decoration: none; font-size: 0.8rem;">Términos y Condiciones</a></p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">REDES SOCIALES</p>
                <p style="color: #555; font-size: 0.8rem;">Instagram: @lisbon.store</p>
                <p style="color: #555; font-size: 0.8rem;">Facebook: /lisbonstore</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">NEWSLETTER</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Tu email" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;">
                    <button class="btn" style="border: 1px solid #222; color: #aaa; border-radius: 0;">→</button>
                </div>
            </div>
        </div>

        <hr style="border-color: #222;">
        <p class="text-center" style="color: #333; font-size: 0.8rem; letter-spacing: 2px;">© 2026 LISBON. TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>