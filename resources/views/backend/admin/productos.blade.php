<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Admin Lisbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black px-4">
    <span class="navbar-brand">Lisbon Admin</span>
    <div>
        <a href="/admin" class="btn btn-sm btn-outline-light me-2">DASHBOARD</a>
        <span class="me-3">{{ auth()->user()->name }}</span>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Productos</h2>
        <a href="/admin/productos/crear" class="btn btn-light" style="letter-spacing: 2px; border-radius: 0;">+ NUEVO PRODUCTO</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>CATEGORÍA</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>${{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if($product->active)
                        <span class="badge bg-success">ACTIVO</span>
                    @else
                        <span class="badge bg-danger">INACTIVO</span>
                    @endif
                </td>
                <td>
                    <a href="/admin/productos/{{ $product->id }}/editar" class="btn btn-sm btn-outline-light me-1">EDITAR</a>

                    @if($product->active)
                        <form action="/admin/productos/{{ $product->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desactivar este producto?')">DESACTIVAR</button>
                        </form>
                    @else
                        <form action="/admin/productos/{{ $product->id }}/activar" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">ACTIVAR</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>