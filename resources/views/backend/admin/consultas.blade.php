<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - Admin Lisbon</title>
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
    <h2 class="mb-4">Consultas Recibidas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($consultas->isEmpty())
        <p style="color: #aaa; letter-spacing: 2px;">NO HAY CONSULTAS AÚN.</p>
    @else
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>MOTIVO</th>
                    <th>CONSULTA</th>
                    <th>FECHA</th>
                    <th>ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr style="{{ !$consulta->leida ? 'border-left: 3px solid #fff;' : '' }}">
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td>{{ $consulta->motivo }}</td>
                    <td style="max-width: 250px;">{{ Str::limit($consulta->consulta, 80) }}</td>
                    <td>{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($consulta->leida)
                            <span class="badge bg-secondary">LEÍDA</span>
                        @else
                            <span class="badge bg-warning text-dark">NUEVA</span>
                        @endif
                    </td>
                    <td>
                        @if(!$consulta->leida)
                            <form action="/admin/consultas/{{ $consulta->id }}/leer" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-outline-light">MARCAR LEÍDA</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>