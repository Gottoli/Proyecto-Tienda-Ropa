<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Lisbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black px-4">
    <span class="navbar-brand">Lisbon Admin</span>
    <div>
        <span class="me-3">{{ auth()->user()->name }}</span>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2>Panel de Administración</h2>
    <span class="badge bg-danger mb-4">Admin</span>

    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Usuarios</h5>
                <h2>{{ $usuarios }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Productos</h5>
                <h2>{{ $productos }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Consultas nuevas</h5>
                <h2>{{ $consultas }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Items en carritos</h5>
                <h2>{{ $itemsCarrito }}</h2>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card bg-black text-white p-4" style="border: 1px solid #333;">
                <h5 style="letter-spacing: 3px; font-size: 0.9rem;">PRODUCTOS</h5>
                <p style="color: #aaa; font-size: 0.85rem;">Gestionar el catálogo de productos</p>
                <a href="/admin/productos" class="btn btn-outline-light" style="letter-spacing: 2px; border-radius: 0;">VER PRODUCTOS</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-black text-white p-4" style="border: 1px solid #333;">
                <h5 style="letter-spacing: 3px; font-size: 0.9rem;">CONSULTAS</h5>
                <p style="color: #aaa; font-size: 0.85rem;">Ver mensajes de clientes</p>
                <a href="/admin/consultas" class="btn btn-outline-light" style="letter-spacing: 2px; border-radius: 0;">VER CONSULTAS</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-black text-white p-4" style="border: 1px solid #333;">
                <h5 style="letter-spacing: 3px; font-size: 0.9rem;">USUARIOS</h5>
                <p style="color: #aaa; font-size: 0.85rem;">Ver usuarios registrados</p>
                <a href="/admin/usuarios" class="btn btn-outline-light" style="letter-spacing: 2px; border-radius: 0;">VER USUARIOS</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>