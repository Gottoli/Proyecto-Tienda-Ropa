<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISBON™</title>

    {{-- Space Grotesk: grotesca geométrica limpia, cercana al PP Neue Montreal de Off-White --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ══════════════════════════════════════
           DESIGN TOKENS — Off-White inspired
           ══════════════════════════════════════ */
        :root {
            --bg:          #FFFFFF;
            --bg-off:      #F4F4F2;   /* casi blanco, para secciones de contraste */
            --bg-black:    #000000;
            --text:        #000000;
            --text-2:      #1C1C1C;
            --text-3:      #777777;
            --border:      #DEDEDE;
            --border-sub:  #F0F0F0;

            /* aliases para compatibilidad con vistas anteriores */
            --cream:       var(--bg);
            --bone:        var(--bg-off);
            --olive:       var(--bg-black);
            --olive-dark:  var(--bg-black);
            --olive-light: #555555;
            --text-1:      var(--text);
        }

        /* ── Reset & Base ── */
        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            background:  var(--bg);
            color:       var(--text);
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size:   19px;
            font-weight: 400;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 300;
            letter-spacing: 0.04em;
        }

        /* ══════════════════════════════════════
           ANNOUNCEMENT BAR
           ══════════════════════════════════════ */
        .announcement-bar {
            background: var(--bg-black);
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            font-size: 12px;
            letter-spacing: 0.22em;
            font-weight: 400;
            white-space: nowrap;
            overflow: hidden;
        }
        .announcement-inner {
            display: inline-block;
            animation: ticker 22s linear infinite;
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ══════════════════════════════════════
           NAVBAR — estilo Off-White
           ══════════════════════════════════════ */
        .site-nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--bg);
            border-bottom: 1px solid var(--border);
        }
        .site-nav__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 58px;
            padding: 0 32px;
        }
        .site-nav__logo {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.35em;
            color: var(--text) !important;
            text-decoration: none;
            flex-shrink: 0;
        }
        .site-nav__logo sup {
            font-size: 11px;
            letter-spacing: 0;
            vertical-align: super;
            font-weight: 400;
        }

        /* centro — lista de nav items */
        .site-nav__menu {
            display: flex;
            align-items: center;
            gap: 0;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .site-nav__menu li { position: relative; }
        .site-nav__menu a,
        .site-nav__menu button {
            display: flex;
            align-items: center;
            height: 58px;
            padding: 0 14px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.16em;
            color: var(--text);
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.15s;
            white-space: nowrap;
        }
        .site-nav__menu a:hover,
        .site-nav__menu button:hover { opacity: 0.5; }
        .site-nav__menu .active-link {
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        /* ── Mega-dropdown ── */
        .site-nav__menu li.has-dropdown { position: static; }

        .nav-mega {
            position: absolute;
            top: 58px;
            left: 0;
            right: 0;
            background: var(--bg);
            border-top: 2px solid var(--text);
            border-bottom: 1px solid var(--border);
            z-index: 997;
            padding: 2.8rem 3rem;
            /* hidden state */
            opacity: 0;
            pointer-events: none;
            transform: translateY(-6px);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
        .has-dropdown.is-open .nav-mega {
            opacity: 1;
            pointer-events: all;
            transform: translateY(0);
        }
        .nav-mega-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            gap: 0;
        }
        .nav-mega-col {
            flex: 1;
            padding-right: 3rem;
            border-right: 1px solid var(--border);
            margin-right: 3rem;
        }
        .nav-mega-col:last-child {
            border-right: none;
            margin-right: 0;
            display: flex;
            align-items: flex-end;
            padding-bottom: 4px;
        }
        .nav-mega-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.3em;
            color: var(--text-3);
            margin: 0 0 1.2rem;
            padding: 0;
            height: auto;
        }
        .nav-mega a {
            display: block;
            height: auto !important;
            padding: 9px 0 !important;
            font-size: 20px !important;
            font-weight: 300;
            letter-spacing: 0.08em;
            color: var(--text);
            text-decoration: none;
            border-bottom: none !important;
            opacity: 1;
            transition: opacity 0.15s;
        }
        .nav-mega a:hover { opacity: 0.45 !important; }
        .nav-mega-all {
            font-size: 13px !important;
            font-weight: 500;
            letter-spacing: 0.22em !important;
            color: var(--text);
            text-decoration: none;
            border-bottom: 1px solid var(--text) !important;
            padding-bottom: 2px !important;
        }

        /* flecha indicador */
        .nav-arrow {
            display: inline-block;
            margin-left: 5px;
            font-size: 11px;
            transition: transform 0.2s ease;
        }
        .has-dropdown.is-open .nav-arrow { transform: rotate(90deg); }

        /* backdrop */
        #navBackdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 996;
        }
        #navBackdrop.is-visible { display: block; }

        /* lado derecho — auth */
        .site-nav__right {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }
        .nav-auth-link {
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.13em;
            color: var(--text);
            text-decoration: none;
            padding: 7px 13px;
            transition: opacity 0.15s;
        }
        .nav-auth-link:hover { opacity: 0.5; color: var(--text); }
        .nav-auth-sep { color: var(--border); font-size: 16px; user-select: none; }
        .nav-auth-pill {
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.13em;
            color: var(--bg);
            background: var(--text);
            padding: 7px 18px;
            text-decoration: none;
            transition: opacity 0.15s;
            border: 1px solid var(--text);
        }
        .nav-auth-pill:hover { opacity: 0.7; color: var(--bg); }

        /* dropdown usuario */
        .user-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 1px);
            right: 0;
            background: var(--bg);
            border: 1px solid var(--border);
            min-width: 180px;
            padding: 0;
            z-index: 999;
        }
        .site-nav__right .user-wrap:hover .user-dropdown { display: block; }
        .user-wrap { position: relative; }
        .user-dropdown a,
        .user-dropdown button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 13px 18px;
            font-size: 13px;
            letter-spacing: 0.13em;
            color: var(--text);
            background: none;
            border: none;
            border-bottom: 1px solid var(--border-sub);
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            transition: opacity 0.15s;
        }
        .user-dropdown a:last-child,
        .user-dropdown button:last-child { border-bottom: none; }
        .user-dropdown a:hover,
        .user-dropdown button:hover { opacity: 0.5; }

        /* ── Mobile ── */
        .nav-mobile-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 1001;
        }

        /* Mobile overlay menu */
        #mobileMenu {
            display: none;
            position: fixed;
            inset: 0;
            background: var(--bg);
            z-index: 1000;
            overflow-y: auto;
            padding: 0;
        }
        #mobileMenu.is-open { display: block; }

        .mobile-menu-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            height: 58px;
            border-bottom: 1px solid var(--border);
        }
        .mobile-menu-close {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 22px;
            padding: 8px;
            color: var(--text);
            line-height: 1;
        }
        .mobile-nav-item {
            border-bottom: 1px solid var(--border);
        }
        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 0.1em;
            color: var(--text);
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            font-family: inherit;
        }
        .mobile-nav-link .mob-arrow {
            font-size: 14px;
            transition: transform 0.2s;
            color: var(--text-3);
        }
        .mobile-nav-item.is-open .mob-arrow { transform: rotate(90deg); }

        .mobile-submenu {
            display: none;
            background: var(--bg-off);
            padding: 4px 0 8px;
        }
        .mobile-nav-item.is-open .mobile-submenu { display: block; }

        .mobile-sub-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.28em;
            color: var(--text-3);
            padding: 16px 28px 8px;
        }
        .mobile-sub-link {
            display: block;
            padding: 12px 28px;
            font-size: 16px;
            font-weight: 300;
            letter-spacing: 0.06em;
            color: var(--text);
            text-decoration: none;
            border-bottom: 1px solid var(--border-sub);
        }
        .mobile-sub-link:last-child { border-bottom: none; }
        .mobile-sub-link:hover { opacity: 0.55; }

        @media (max-width: 991px) {
            .site-nav__menu { display: none !important; }
            .nav-mobile-toggle { display: block; }
            .site-nav__inner { padding: 0 16px; }
            .nav-mega { display: none !important; }
        }

        /* ══════════════════════════════════════
           FOOTER
           ══════════════════════════════════════ */
        .site-footer {
            background: var(--bg);
            border-top: 1px solid var(--border);
            padding: 4rem 0 2.5rem;
        }
        .site-footer a {
            color: var(--text-2);
            text-decoration: none;
            font-size: 15px;
            letter-spacing: 0.04em;
            transition: opacity 0.15s;
        }
        .site-footer a:hover { opacity: 0.5; }

        /* ══════════════════════════════════════
           DESIGN SYSTEM — componentes reutilizables
           ══════════════════════════════════════ */

        /* Botones */
        .btn-lisbon {
            display: inline-block;
            border: 1px solid var(--text);
            color: var(--text);
            background: transparent;
            padding: 13px 30px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.16em;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.18s, color 0.18s;
        }
        .btn-lisbon:hover { background: var(--text); color: var(--bg); text-decoration: none; }

        .btn-lisbon-filled {
            display: inline-block;
            border: 1px solid var(--text);
            background: var(--text);
            color: var(--bg);
            padding: 15px 34px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.16em;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.18s;
        }
        .btn-lisbon-filled:hover { opacity: 0.75; color: var(--bg); text-decoration: none; }

        .btn-lisbon-ghost {
            display: inline-block;
            border: 1px solid var(--border);
            color: var(--text-3);
            background: transparent;
            padding: 10px 20px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 0.12em;
            cursor: pointer;
            text-decoration: none;
            transition: border-color 0.18s, color 0.18s;
        }
        .btn-lisbon-ghost:hover { border-color: var(--text); color: var(--text); text-decoration: none; }

        /* Formularios */
        .lisbon-input {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 0;
            color: var(--text);
            padding: 15px 18px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 0.02em;
            outline: none;
            transition: border-color 0.2s;
            -webkit-appearance: none;
        }
        .lisbon-input:focus { border-color: var(--text); }
        .lisbon-input::placeholder { color: var(--text-3); }

        .lisbon-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.2em;
            color: var(--text-3);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        /* Alertas */
        .lisbon-success {
            border: 1px solid #000;
            background: #F0F4EE;
            color: #000;
            padding: 15px 20px;
            font-size: 14px;
            letter-spacing: 0.08em;
            margin-bottom: 1.5rem;
        }
        .lisbon-error {
            border: 1px solid #000;
            background: #FBF0EE;
            color: #000;
            padding: 15px 20px;
            font-size: 14px;
            letter-spacing: 0.08em;
            margin-bottom: 1.5rem;
        }

        /* Cards */
        .lisbon-card { background: var(--bg-off); border: 1px solid var(--border); }
        .lisbon-card-white { background: var(--bg); border: 1px solid var(--border); }

        /* Tablas */
        .lisbon-table { width: 100%; border-collapse: collapse; }
        .lisbon-table th {
            padding: 14px 18px;
            text-align: left;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.18em;
            color: var(--text-3);
            border-bottom: 1px solid var(--border);
        }
        .lisbon-table td {
            padding: 18px 18px;
            font-size: 15px;
            letter-spacing: 0.02em;
            color: var(--text-2);
            border-bottom: 1px solid var(--border-sub);
            vertical-align: middle;
        }
        .lisbon-table tr:hover td { background: var(--bg-off); }

        /* Badges */
        .badge-olive  { border: 1px solid #000; color: #000; padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }
        .badge-muted  { border: 1px solid var(--border); color: var(--text-3); padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }
        .badge-warm   { border: 1px solid #8A6A2A; color: #8A6A2A; padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }
        .badge-error  { border: 1px solid #B03020; color: #B03020; padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }
        .badge-admin  { border: 1px solid #000; color: #000; padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }
        .badge-client { border: 1px solid var(--text-3); color: var(--text-3); padding: 3px 10px; font-size: 11px; font-weight: 500; letter-spacing: 0.18em; }

        /* Admin subnav */
        .admin-subnav { background: var(--bg-off); border-bottom: 1px solid var(--border); padding: 0; }
        .admin-subnav .container { display: flex; align-items: center; height: 40px; gap: 0; }
        .admin-subnav .subnav-label { font-size: 11px; font-weight: 500; letter-spacing: 0.28em; color: var(--border); margin-right: 16px; text-transform: uppercase; }
        .admin-subnav a {
            display: flex; align-items: center; height: 44px;
            padding: 0 16px;
            font-size: 12px; font-weight: 500; letter-spacing: 0.18em;
            color: var(--text-3); text-decoration: none;
            border-right: 1px solid var(--border-sub);
            transition: color 0.15s;
        }
        .admin-subnav a:first-of-type { border-left: 1px solid var(--border-sub); }
        .admin-subnav a.is-active { color: var(--text); background: var(--bg); }
        .admin-subnav a:hover { color: var(--text); }

        /* Dividers / helpers */
        .lisbon-hr { border: none; border-top: 1px solid var(--border); margin: 2.5rem 0; }

        /* Typography helpers */
        .page-eyebrow {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.28em;
            color: var(--text-3);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }
        .page-title {
            font-size: clamp(36px, 5.5vw, 72px);
            font-weight: 300;
            letter-spacing: 0.06em;
            color: var(--text);
            line-height: 1.05;
        }
        .section-label {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.28em;
            color: var(--text-3);
            text-transform: uppercase;
        }

        /* Talle agotado */
        .talle-agotado {
            opacity: 0.3 !important;
            position: relative;
            cursor: not-allowed !important;
        }
        .talle-agotado::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 4px;
            right: 4px;
            height: 1px;
            background: var(--text-3);
            transform: rotate(-20deg);
        }

        /* Quote marks — Off-White signature */
        .ow-quote::before { content: '"'; margin-right: 2px; }
        .ow-quote::after  { content: '"'; margin-left: 2px; }

        /* Toast */
        #lisbonToast {
            position: fixed;
            bottom: 36px;
            right: 36px;
            background: #000;
            color: #fff;
            padding: 16px 28px;
            font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.2em;
            z-index: 9999;
            pointer-events: none;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        #lisbonToast.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>

{{-- ── Announcement bar ── --}}
<div class="announcement-bar">
    <span class="announcement-inner">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp; · &nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS +$50.000 &nbsp;&nbsp;&nbsp; · &nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp; · &nbsp;&nbsp;&nbsp; NUEVA COLECCIÓN INVIERNO 2026 &nbsp;&nbsp;&nbsp; · &nbsp;&nbsp;&nbsp; ENVÍOS GRATIS EN COMPRAS +$50.000 &nbsp;&nbsp;&nbsp; · &nbsp;&nbsp;&nbsp; HASTA 40% OFF EN SELECCIONADOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
</div>

{{-- Backdrop para cerrar mega-menu --}}
<div id="navBackdrop"></div>

{{-- ── Mobile overlay menu ── --}}
<div id="mobileMenu" role="dialog" aria-modal="true">
    <div class="mobile-menu-header">
        <a href="/" class="site-nav__logo">LISBON<sup>™</sup></a>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Cerrar menú">✕</button>
    </div>

    {{-- Catálogo expandible --}}
    <div class="mobile-nav-item" id="mobCatalogo">
        <button class="mobile-nav-link" onclick="toggleMobSection('mobCatalogo')">
            CATÁLOGO <span class="mob-arrow">›</span>
        </button>
        <div class="mobile-submenu">
            <p class="mobile-sub-label">HOMBRE</p>
            <a href="/catalogo?categoria=camperas&genero=hombre"   class="mobile-sub-link">CAMPERAS</a>
            <a href="/catalogo?categoria=remeras&genero=hombre"    class="mobile-sub-link">REMERAS</a>
            <a href="/catalogo?categoria=pantalones&genero=hombre" class="mobile-sub-link">PANTALONES</a>
            <a href="/catalogo?categoria=buzos&genero=hombre"      class="mobile-sub-link">BUZOS</a>
            <p class="mobile-sub-label" style="margin-top: 8px;">MUJER</p>
            <a href="/catalogo?categoria=camperas&genero=mujer"    class="mobile-sub-link">CAMPERAS</a>
            <a href="/catalogo?categoria=remeras&genero=mujer"     class="mobile-sub-link">REMERAS</a>
            <a href="/catalogo?categoria=pantalones&genero=mujer"  class="mobile-sub-link">PANTALONES</a>
            <a href="/catalogo?categoria=buzos&genero=mujer"       class="mobile-sub-link">BUZOS</a>
            <a href="/catalogo" class="mobile-sub-link" style="font-weight:500; letter-spacing:0.16em; font-size:13px; padding-top:16px;">VER TODO →</a>
        </div>
    </div>

    <div class="mobile-nav-item"><a href="/"                class="mobile-nav-link">INICIO</a></div>
    <div class="mobile-nav-item"><a href="/quienes-somos"   class="mobile-nav-link">NOSOTROS</a></div>
    <div class="mobile-nav-item"><a href="/comercializacion" class="mobile-nav-link">COMPRAS</a></div>
    <div class="mobile-nav-item"><a href="/consultas"        class="mobile-nav-link">CONSULTAS</a></div>
    <div class="mobile-nav-item"><a href="/contacto"         class="mobile-nav-link">CONTACTO</a></div>

    {{-- Auth en mobile --}}
    <div style="padding: 32px 20px; border-top: 1px solid var(--border); margin-top: auto;">
        @auth
            <p style="font-size:13px; letter-spacing:0.15em; color:var(--text-3); margin-bottom:16px;">
                {{ strtoupper(auth()->user()->name) }}
            </p>
            @if(auth()->user()->rol === 'admin')
                <a href="/admin" class="btn-lisbon d-block text-center" style="margin-bottom:12px;">PANEL ADMIN</a>
            @else
                <a href="/cliente" class="btn-lisbon d-block text-center" style="margin-bottom:12px;">MI CUENTA</a>
                <a href="/carrito" class="btn-lisbon d-block text-center" style="margin-bottom:12px;">MI CARRITO</a>
            @endif
            <form action="/logout" method="POST">@csrf
                <button type="submit" class="btn-lisbon" style="width:100%; text-align:center;">CERRAR SESIÓN</button>
            </form>
        @else
            <a href="/registro" class="btn-lisbon d-block text-center" style="margin-bottom:12px;">REGISTRO</a>
            <a href="/login"    class="btn-lisbon-filled d-block text-center">LOGIN</a>
        @endauth
    </div>
</div>

{{-- ── Navbar ── --}}
<header class="site-nav">
    <div class="site-nav__inner">

        {{-- Logo --}}
        <a href="/" class="site-nav__logo">LISBON<sup>™</sup></a>

        {{-- Nav links (desktop) --}}
        <ul class="site-nav__menu">
            <li><a href="/">INICIO</a></li>
            <li><a href="/quienes-somos">NOSOTROS</a></li>

            {{-- Catálogo con mega-menu --}}
            <li class="has-dropdown" id="navCatalogo">
                <button onclick="toggleMegaMenu('navCatalogo')" style="background:none;border:none;cursor:pointer;font-family:inherit;font-size:13px;font-weight:500;letter-spacing:0.16em;color:var(--text);display:flex;align-items:center;height:58px;padding:0 14px;white-space:nowrap;">
                    CATÁLOGO <span class="nav-arrow">›</span>
                </button>
                <div class="nav-mega">
                    <div class="nav-mega-inner">
                        <div class="nav-mega-col">
                            <p class="nav-mega-label">HOMBRE</p>
                            <a href="/catalogo?categoria=camperas&genero=hombre">CAMPERAS</a>
                            <a href="/catalogo?categoria=remeras&genero=hombre">REMERAS</a>
                            <a href="/catalogo?categoria=pantalones&genero=hombre">PANTALONES</a>
                            <a href="/catalogo?categoria=buzos&genero=hombre">BUZOS</a>
                        </div>
                        <div class="nav-mega-col">
                            <p class="nav-mega-label">MUJER</p>
                            <a href="/catalogo?categoria=camperas&genero=mujer">CAMPERAS</a>
                            <a href="/catalogo?categoria=remeras&genero=mujer">REMERAS</a>
                            <a href="/catalogo?categoria=pantalones&genero=mujer">PANTALONES</a>
                            <a href="/catalogo?categoria=buzos&genero=mujer">BUZOS</a>
                        </div>
                        <div class="nav-mega-col">
                            <a href="/catalogo" class="nav-mega-all">VER TODA LA COLECCIÓN →</a>
                        </div>
                    </div>
                </div>
            </li>

            <li><a href="/comercializacion">COMPRAS</a></li>
            <li><a href="/consultas">CONSULTAS</a></li>
            <li><a href="/contacto">CONTACTO</a></li>
        </ul>

        {{-- Botón hamburguesa mobile --}}
        <button class="nav-mobile-toggle" id="mobileToggle" aria-label="Menú">
            <svg width="22" height="14" viewBox="0 0 22 14" fill="none">
                <path d="M0 1H22M0 7H22M0 13H22" stroke="black" stroke-width="1.4"/>
            </svg>
        </button>

        {{-- Lado derecho: Auth --}}
        <div class="site-nav__right">
            @auth
                <div class="user-wrap">
                    <button class="nav-auth-link" style="background:none; border:none; cursor:pointer; font-family:inherit;">
                        {{ strtoupper(explode(' ', auth()->user()->name)[0]) }} ↓
                    </button>
                    <div class="user-dropdown">
                        @if(auth()->user()->rol === 'admin')
                            <a href="/admin">PANEL ADMIN</a>
                        @else
                            <a href="/cliente">MI CUENTA</a>
                            <a href="/carrito">MI CARRITO</a>
                        @endif
                        <form action="/logout" method="POST" style="margin:0;">
                            @csrf
                            <button type="submit">CERRAR SESIÓN</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/registro" class="nav-auth-link">REGISTRO</a>
                <span class="nav-auth-sep">|</span>
                <a href="/login" class="nav-auth-pill">LOGIN</a>
            @endauth
        </div>

    </div>
</header>

@yield('contenido')

{{-- Toast de notificación global --}}
<div id="lisbonToast"><span id="lisbonToastMsg"></span></div>

{{-- ── Footer ── --}}
<footer class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4" style="border-right: 1px solid var(--border);">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 8px;">"ENVIAMOS TU COMPRA"</p>
                <p style="font-size: 16px; color: var(--text-3);">Entregas a todo el país</p>
            </div>
            <div class="col-md-4 ps-md-5" style="border-right: 1px solid var(--border);">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 8px;">"PAGÁ COMO QUIERAS"</p>
                <p style="font-size: 16px; color: var(--text-3);">Tarjetas, transferencia y Mercado Pago</p>
            </div>
            <div class="col-md-4 ps-md-5">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 8px;">"COMPRÁ CON SEGURIDAD"</p>
                <p style="font-size: 16px; color: var(--text-3);">Tus datos siempre protegidos</p>
            </div>
        </div>

        <hr class="lisbon-hr" style="margin: 0 0 3rem;">

        <div class="row">
            <div class="col-md-4">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.2rem;">NAVEGACIÓN</p>
                @foreach([['/', 'Inicio'], ['/catalogo', 'Catálogo'], ['/quienes-somos', 'Quiénes Somos'], ['/contacto', 'Contacto'], ['/terminos', 'Términos']] as [$url, $label])
                    <p style="margin-bottom: 6px;"><a href="{{ $url }}" style="font-size:16px; color: var(--text-3);">{{ $label }}</a></p>
                @endforeach
            </div>
            <div class="col-md-4">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.2rem;">REDES SOCIALES</p>
                <p style="font-size: 16px; color: var(--text-3); margin-bottom: 6px;">Instagram: @lisbon.store</p>
                <p style="font-size: 16px; color: var(--text-3);">Facebook: /lisbonstore</p>
            </div>
            <div class="col-md-4">
                <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.2rem;">NEWSLETTER</p>
                <div class="d-flex">
                    <input type="email" placeholder="Tu email"
                        style="flex:1; background:#fff; border:1px solid var(--border); border-right:none; color:var(--text); padding:13px 16px; font-family:'Space Grotesk',sans-serif; font-size:15px; outline:none; border-radius:0;">
                    <button style="background:var(--text); color:#fff; border:1px solid var(--text); padding:13px 20px; font-family:'Space Grotesk',sans-serif; font-size:15px; cursor:pointer;">→</button>
                </div>
            </div>
        </div>

        <hr class="lisbon-hr">

        <div class="d-flex justify-content-between align-items-center">
            <p style="font-size: 13px; letter-spacing: 0.13em; color: var(--text-3); margin: 0;">© 2026 LISBON™</p>
            <p style="font-size: 13px; letter-spacing: 0.13em; color: var(--text-3); margin: 0;">TODOS LOS DERECHOS RESERVADOS.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toast
    function showToast(msg) {
        const t = document.getElementById('lisbonToast');
        document.getElementById('lisbonToastMsg').textContent = msg;
        t.classList.add('is-visible');
        clearTimeout(window._toastTimer);
        window._toastTimer = setTimeout(function() { t.classList.remove('is-visible'); }, 3200);
    }

    // Interceptar formularios de agregar al carrito
    document.addEventListener('submit', function(e) {
        var form = e.target;
        if (!form.hasAttribute('data-add-to-cart')) return;
        e.preventDefault();
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: { 'Accept': 'application/json' },
        })
        .then(function(r) { return r.ok ? r.json() : Promise.reject(); })
        .then(function(data) {
            showToast(data.message || 'PRODUCTO AGREGADO →');
        })
        .catch(function() { form.submit(); });
    });

    // ── Mega-menu desktop ──
    function toggleMegaMenu(id) {
        var li = document.getElementById(id);
        var isOpen = li.classList.contains('is-open');
        // cierra todos
        document.querySelectorAll('.has-dropdown.is-open').forEach(function(el) { el.classList.remove('is-open'); });
        document.getElementById('navBackdrop').classList.remove('is-visible');
        if (!isOpen) {
            li.classList.add('is-open');
            document.getElementById('navBackdrop').classList.add('is-visible');
        }
    }
    document.getElementById('navBackdrop').addEventListener('click', function() {
        document.querySelectorAll('.has-dropdown.is-open').forEach(function(el) { el.classList.remove('is-open'); });
        this.classList.remove('is-visible');
    });

    // ── Mobile accordion ──
    function toggleMobSection(id) {
        var item = document.getElementById(id);
        item.classList.toggle('is-open');
    }

    // Abrir / cerrar menú mobile
    document.getElementById('mobileToggle').addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.add('is-open');
        document.body.style.overflow = 'hidden';
    });
    function closeMobileMenu() {
        document.getElementById('mobileMenu').classList.remove('is-open');
        document.body.style.overflow = '';
    }
    document.getElementById('mobileMenuClose').addEventListener('click', closeMobileMenu);
    // Cerrar al hacer click en link del menú mobile
    document.querySelectorAll('#mobileMenu a').forEach(function(a) {
        a.addEventListener('click', closeMobileMenu);
    });
</script>
</body>
</html>
