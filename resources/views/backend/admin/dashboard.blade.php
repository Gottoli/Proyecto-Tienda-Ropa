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
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Usuarios registrados</h5>
                <h2>{{ $usuarios }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Productos</h5>
                <h2>{{ $productos }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white text-center p-4">
                <h5>Pedidos</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>