<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISBON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cream:       #FAFAF7;
            --bone:        #F5F0E8;
            --olive:       #4A5240;
            --olive-dark:  #2E3228;
            --olive-light: #6B7260;
            --text-1:      #1A1814;
            --text-2:      #5A5848;
            --text-3:      #9A9688;
            --border:      #D8D3C8;
            --border-sub:  #E8E4DC;
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--cream);
            color: var(--text-1);
            font-family: 'Georgia', serif;
            font-size: 16px;
            line-height: 1.7;
        }

        /* ── Navbar ── */
        .navbar { background-color: var(--cream) !important; border-bottom: 1px solid var(--border); }
        .navbar-brand {
            font-size: 1.7rem;
            letter-spacing: 10px;
            color: var(--olive-dark) !important;
            font-weight: 400;
        }
        .navbar-nav .nav-link {
            color: var(--olive) !important;
            letter-spacing: 3px;
            font-size: 0.78rem;
            padding: 1rem 1.1rem !important;
            transition: color 0.2s;
        }
        .navbar-nav .nav-link:hover { color: var(--olive-dark) !important; }
        .dropdown-menu {
            background: var(--cream) !important;
            border: 1px solid var(--border) !important;
            border-radius: 0 !important;
            margin-top: 0 !important;
            padding: 1.2rem !important;
            min-width: 200px;
        }
        .dropdown-item {
            color: var(--olive) !important;
            letter-spacing: 2px;
            font-size: 0.78rem;
            padding: 0.5rem 1rem !important;
            transition: background 0.2s, color 0.2s;
        }
        .dropdown-item:hover {
            background-color: var(--bone) !important;
            color: var(--olive-dark) !important;
        }
        .dropdown:hover > .dropdown-menu { display: block; }
        .dropend:hover > .dropdown-menu { display: block; }
        .navbar-toggler { border-color: var(--border); }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%234A5240' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }
        .dropdown-divider { border-color: var(--border) !important; }

        /* ── Footer ── */
        footer {
            background-color: var(--cream);
            border-top: 1px solid var(--border);
            color: var(--text-3);
        }
        footer a { color: var(--text-2); text-decoration: none; transition: color 0.2s; }
        footer a:hover { color: var(--olive-dark); }

        /* ── Marquee ── */
        @keyframes marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ══ Design System ══ */

        /* Buttons */
        .btn-lisbon {
            border: 1px solid var(--olive);
            color: var(--olive);
            background: transparent;
            padding: 11px 28px;
            letter-spacing: 3px;
            font-size: 0.78rem;
            font-family: 'Georgia', serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, color 0.2s;
        }
        .btn-lisbon:hover { background: var(--olive); color: var(--cream); text-decoration: none; }

        .btn-lisbon-filled {
            border: 1px solid var(--olive);
            background: var(--olive);
            color: var(--cream);
            padding: 13px 32px;
            letter-spacing: 4px;
            font-size: 0.78rem;
            font-family: 'Georgia', serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, border-color 0.2s;
        }
        .btn-lisbon-filled:hover { background: var(--olive-dark); border-color: var(--olive-dark); color: var(--cream); text-decoration: none; }

        .btn-lisbon-ghost {
            border: 1px solid var(--border);
            color: var(--text-2);
            background: transparent;
            padding: 8px 18px;
            letter-spacing: 2px;
            font-size: 0.72rem;
            font-family: 'Georgia', serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: border-color 0.2s, color 0.2s;
        }
        .btn-lisbon-ghost:hover { border-color: var(--olive); color: var(--olive); text-decoration: none; }

        /* Forms */
        .lisbon-input {
            width: 100%;
            background: #fff;
            border: 1px solid var(--border);
            color: var(--text-1);
            padding: 12px 16px;
            font-family: 'Georgia', serif;
            font-size: 0.95rem;
            outline: none;
            border-radius: 0;
            transition: border-color 0.2s;
        }
        .lisbon-input:focus { border-color: var(--olive); }
        .lisbon-label {
            letter-spacing: 2px;
            font-size: 0.72rem;
            color: var(--text-3);
            display: block;
            margin-bottom: 8px;
        }

        /* Alerts */
        .lisbon-success {
            border: 1px solid var(--olive);
            background: #F0F2EE;
            color: var(--olive);
            padding: 12px 16px;
            letter-spacing: 1px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
        .lisbon-error {
            border: 1px solid #8A4A3A;
            background: #FBF3F0;
            color: #8A4A3A;
            padding: 12px 16px;
            letter-spacing: 1px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        /* Cards */
        .lisbon-card { background: var(--bone); border: 1px solid var(--border); }
        .lisbon-card-white { background: #fff; border: 1px solid var(--border); }

        /* Tables */
        .lisbon-table { width: 100%; border-collapse: collapse; }
        .lisbon-table th {
            padding: 12px 16px;
            text-align: left;
            letter-spacing: 2px;
            font-size: 0.7rem;
            color: var(--text-3);
            font-weight: normal;
            border-bottom: 1px solid var(--border);
        }
        .lisbon-table td {
            padding: 14px 16px;
            font-size: 0.88rem;
            color: var(--text-2);
            border-bottom: 1px solid var(--border-sub);
            vertical-align: middle;
        }
        .lisbon-table tr:hover td { background: var(--bone); }

        /* Badges */
        .badge-olive { border: 1px solid var(--olive); color: var(--olive); padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }
        .badge-muted { border: 1px solid var(--border); color: var(--text-3); padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }
        .badge-warm  { border: 1px solid #8A6A2A; color: #8A6A2A; padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }
        .badge-error { border: 1px solid #8A4A3A; color: #8A4A3A; padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }
        .badge-admin { border: 1px solid #6B4A3A; color: #6B4A3A; padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }
        .badge-client { border: 1px solid var(--olive-light); color: var(--olive-light); padding: 3px 10px; font-size: 0.7rem; letter-spacing: 2px; }

        /* Admin subnav */
        .admin-subnav { background: var(--bone); border-bottom: 1px solid var(--border); padding: 10px 0; }
        .admin-subnav .sep { color: var(--border); }
        .admin-subnav a { color: var(--text-3); text-decoration: none; letter-spacing: 2px; font-size: 0.72rem; transition: color 0.2s; }
        .admin-subnav a.is-active { color: var(--olive); }
        .admin-subnav a:hover { color: var(--olive-dark); }
        .admin-subnav .subnav-label { color: var(--border); letter-spacing: 3px; font-size: 0.65rem; }

        /* Dividers */
        .lisbon-hr { border: none; border-top: 1px solid var(--border); margin: 2.5rem 0; }

        /* Page headers */
        .page-eyebrow { letter-spacing: 5px; font-size: 0.72rem; color: var(--text-3); margin-bottom: 0.4rem; }
        .page-title { font-weight: 300; letter-spacing: 6px; color: var(--olive-dark); }
        .section-label { letter-spacing: 4px; font-size: 0.72rem; color: var(--text-3); }
    </style>
</head>
<body>

{{-- Marquee olive --}}
<div style="background: var(--olive); color: var(--cream); padding: 9px 0; overflow: hidden;">
    <div style="white-space: nowrap; animation: marquee 18s linear infinite; display: inline-block; letter-spacing: 4px; font-size: 0.72rem;">
        &nbsp;&nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS MAYORES A $50.000 &nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS MAYORES A $50.000 &nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">LISBON</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="/">INICIO</a></li>
                <li class="nav-item"><a class="nav-link" href="/quienes-somos">NOSOTROS</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/catalogo" role="button" data-bs-toggle="dropdown">CATÁLOGO</a>
                    <ul class="dropdown-menu">
                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#">HOMBRE</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/catalogo?categoria=camperas&genero=hombre">CAMPERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=remeras&genero=hombre">REMERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=pantalones&genero=hombre">PANTALONES</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=buzos&genero=hombre">BUZOS</a></li>
                            </ul>
                        </li>
                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#">MUJER</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/catalogo?categoria=camperas&genero=mujer">CAMPERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=remeras&genero=mujer">REMERAS</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=pantalones&genero=mujer">PANTALONES</a></li>
                                <li><a class="dropdown-item" href="/catalogo?categoria=buzos&genero=mujer">BUZOS</a></li>
                            </ul>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/catalogo">VER TODO</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="/comercializacion">COMPRAS</a></li>
                <li class="nav-item"><a class="nav-link" href="/contacto">CONTACTO</a></li>
                <li class="nav-item"><a class="nav-link" href="/consultas">CONSULTAS</a></li>
                <li class="nav-item"><a class="nav-link" href="/terminos">TÉRMINOS</a></li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 5px; opacity: 0.7;">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z"/>
                            </svg>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(auth()->user()->rol === 'admin')
                                <li><a class="dropdown-item" href="/admin">PANEL ADMIN</a></li>
                            @else
                                <li><a class="dropdown-item" href="/cliente">MI CUENTA</a></li>
                                <li><a class="dropdown-item" href="/carrito">MI CARRITO</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="background: none; border: none; width: 100%; text-align: left; font-family: 'Georgia', serif;">CERRAR SESIÓN</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-2">
                        <a class="nav-link btn-lisbon" href="/login" style="padding: 7px 20px !important; font-size: 0.72rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 5px;">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z"/>
                            </svg>
                            LOGIN
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@yield('contenido')

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4" style="border-right: 1px solid var(--border);">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: var(--olive); margin-bottom: 0.4rem;">ENVIAMOS TU COMPRA</p>
                <p style="color: var(--text-2); font-size: 0.95rem;">Entregas a todo el país</p>
            </div>
            <div class="col-md-4" style="border-right: 1px solid var(--border);">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: var(--olive); margin-bottom: 0.4rem;">PAGÁ COMO QUIERAS</p>
                <p style="color: var(--text-2); font-size: 0.95rem;">Tarjetas, transferencia y Mercado Pago</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 4px; font-size: 0.8rem; color: var(--olive); margin-bottom: 0.4rem;">COMPRÁ CON SEGURIDAD</p>
                <p style="color: var(--text-2); font-size: 0.95rem;">Tus datos siempre protegidos</p>
            </div>
        </div>

        <hr class="lisbon-hr">

        <div class="row mt-4">
            <div class="col-md-4">
                <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.2rem;">NAVEGACIÓN</p>
                <p><a href="/">Inicio</a></p>
                <p><a href="/catalogo">Catálogo</a></p>
                <p><a href="/quienes-somos">Quiénes Somos</a></p>
                <p><a href="/contacto">Contacto</a></p>
                <p><a href="/terminos">Términos y Condiciones</a></p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.2rem;">REDES SOCIALES</p>
                <p>Instagram: @lisbon.store</p>
                <p>Facebook: /lisbonstore</p>
            </div>
            <div class="col-md-4">
                <p style="letter-spacing: 5px; font-size: 0.72rem; color: var(--olive); margin-bottom: 1.2rem;">NEWSLETTER</p>
                <div class="d-flex">
                    <input type="email" placeholder="Tu email"
                        style="flex: 1; background: #fff; border: 1px solid var(--border); border-right: none; color: var(--text-1); padding: 10px 14px; font-family: 'Georgia', serif; font-size: 0.85rem; outline: none; border-radius: 0;">
                    <button style="border: 1px solid var(--olive); background: var(--olive); color: var(--cream); padding: 10px 18px; font-family: 'Georgia', serif; cursor: pointer; border-radius: 0; font-size: 0.85rem;">→</button>
                </div>
            </div>
        </div>

        <hr class="lisbon-hr">

        <p class="text-center" style="color: var(--text-3); font-size: 0.75rem; letter-spacing: 3px;">© 2026 LISBON. TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
