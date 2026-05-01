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
        .dropdown-item:hover { background-color: #111 !important; color: #fff !important; }
        footer { background-color: #0a0a0a; border-top: 1px solid #222; color: #555; }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .navbar-nav .nav-link { font-size: 0.9rem; padding: 1rem 1.2rem !important; }
        .dropdown:hover > .dropdown-menu { display: block; }
        .dropend:hover > .dropdown-menu { display: block; }
        .dropdown-menu { margin-top: 0 !important; padding: 1.5rem !important; min-width: 200px; }
        .dropdown-item { padding: 0.5rem 1rem !important; font-size: 0.85rem !important; }
    </style>
</head>
<body>

<div style="background: #f0f0f0; color: #0a0a0a; padding: 8px 0; overflow: hidden;">
    <div style="white-space: nowrap; animation: marquee 15s linear infinite; display: inline-block;">
        &nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS MAYORES A $50.000 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS MAYORES A $50.000 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp;
    </div>
</div>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">LISBON</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">INICIO</a></li>
                <li class="nav-item"><a class="nav-link" href="/quienes-somos">NOSOTROS</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/catalogo" role="button" data-bs-toggle="dropdown">CATÁLOGO</a>
                    <ul class="dropdown-menu" style="background: #0a0a0a; border: 1px solid #222; border-radius: 0;">

                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">HOMBRE</a>
                            <ul class="dropdown-menu" style="background: #0a0a0a; border: 1px solid #222; border-radius: 0;">
                                <li><a class="dropdown-item" href="/catalogo?categoria=camperas&genero=hombre" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">CAMPERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=remeras&genero=hombre" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">REMERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=pantalones&genero=hombre" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">PANTALONES</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=buzos&genero=hombre" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">BUZOS</a></li>
                            </ul>
                        </li>

                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">MUJER</a>
                            <ul class="dropdown-menu" style="background: #0a0a0a; border: 1px solid #222; border-radius: 0;">
                                <li><a class="dropdown-item" href="/catalogo?categoria=camperas&genero=mujer" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">CAMPERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=remeras&genero=mujer" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">REMERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=pantalones&genero=mujer" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">PANTALONES</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=buzos&genero=mujer" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">BUZOS</a></li>
                            </ul>
                        </li>

                        <li><hr class="dropdown-divider" style="border-color: #222;"></li>
                        <li><a class="dropdown-item" href="/catalogo" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">VER TODO</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="/comercializacion">COMPRAS</a></li>
                <li class="nav-item"><a class="nav-link" href="/contacto">CONTACTO</a></li>
                <li class="nav-item"><a class="nav-link" href="/consultas">CONSULTAS</a></li>
                <li class="nav-item"><a class="nav-link" href="/terminos">TÉRMINOS</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('contenido')

<footer class="py-5 mt-5" style="border-top: 1px solid #222;">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4" style="border-right: 1px solid #222;">
                <p style="letter-spacing: 3px; font-size: 1rem; color: #fff;">📦 ENVIAMOS TU COMPRA</p>
                <p style="color: #aaa; font-size: 1.1rem;">Entregas a todo el país</p>
            </div>
            <div class="col-md-4" style="border-right: 1px solid #222;">
                <p style="letter-spacing: 3px; font-size: 1rem; color: #fff;">💳 PAGÁ COMO QUIERAS</p>
                <p style="color: #aaa; font-size: 1.1rem;">Tarjetas, transferencia y Mercado Pago</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 3px; font-size: 1rem; color: #fff;">🔒 COMPRÁ CON SEGURIDAD</p>
                <p style="color: #aaa; font-size: 1.1rem;">Tus datos siempre protegidos</p>
            </div>
        </div>
        <hr style="border-color: #222;">
        <div class="row mt-4">
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.9rem; color: #fff;">NAVEGACIÓN</p>
                <p><a href="/" style="color: #aaa; text-decoration: none; font-size: 1.1rem;">Inicio</a></p>
                <p><a href="/catalogo" style="color: #aaa; text-decoration: none; font-size: 1.1rem;">Catálogo</a></p>
                <p><a href="/quienes-somos" style="color: #aaa; text-decoration: none; font-size: 1.1rem;">Quiénes Somos</a></p>
                <p><a href="/contacto" style="color: #aaa; text-decoration: none; font-size: 1.1rem;">Contacto</a></p>
                <p><a href="/terminos" style="color: #aaa; text-decoration: none; font-size: 1.1rem;">Términos y Condiciones</a></p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.9rem; color: #fff;">REDES SOCIALES</p>
                <p style="color: #aaa; font-size: 1.1rem;">Instagram: @lisbon.store</p>
                <p style="color: #aaa; font-size: 1.1rem;">Facebook: /lisbonstore</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.9rem; color: #fff;">NEWSLETTER</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Tu email" style="background: #111; border: 1px solid #222; color: #f0f0f0; border-radius: 0;">
                    <button class="btn" style="border: 1px solid #222; color: #aaa; border-radius: 0;">→</button>
                </div>
            </div>
        </div>
        <hr style="border-color: #222;">
        <p class="text-center" style="color: #aaa; font-size: 0.9rem; letter-spacing: 2px;">© 2026 LISBON. TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>