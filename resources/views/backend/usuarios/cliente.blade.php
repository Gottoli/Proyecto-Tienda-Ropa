<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta - Lisbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black px-4">
    <span class="navbar-brand">Lisbon</span>
    <div>
        <span class="me-3">{{ auth()->user()->name }}</span>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2>Mi cuenta</h2>
    <span class="badge bg-primary mb-4">Cliente</span>

    <div class="card bg-secondary text-white p-4 mt-3">
        <h5>{{ auth()->user()->name }}</h5>
        <p>{{ auth()->user()->email }}</p>
        <p>Cliente desde {{ auth()->user()->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Mi carrito</h5>
                <p>Revisá los productos que agregaste</p>
                <a href="/carrito" class="btn btn-warning">Ver carrito</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Productos</h5>
                <p>Explorá nuestro catálogo</p>
                <a href="/catalogo" class="btn btn-primary">Ver productos</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>