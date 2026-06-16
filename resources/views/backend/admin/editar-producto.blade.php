<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Admin Lisbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black px-4">
    <span class="navbar-brand">Lisbon Admin</span>
    <div>
        <a href="/admin/productos" class="btn btn-sm btn-outline-light me-2">← VOLVER</a>
        <span class="me-3">{{ auth()->user()->name }}</span>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="mb-4">Editar Producto</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/productos/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">NOMBRE</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">DESCRIPCIÓN</label>
                    <textarea name="description" rows="3" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;">{{ old('description', $product->description) }}</textarea>
                </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                 <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">PRECIO</label>
             <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;">
                 @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6 mb-3">
             <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">STOCK</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;">
             @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            </div>

            <div class="mb-3">
                <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">TALLES DISPONIBLES</label>
                <input type="text" name="talles" value="{{ old('talles', $product->talles) }}" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;" placeholder="Ej: XS,S,M,L,XL">
                <small style="color: #555;">Separados por coma</small>
            </div>

                <div class="mb-3">
                    <label style="letter-spacing: 2px; font-size: 0.8rem; color: #aaa;">CATEGORÍA</label>
                    <select name="category_id" class="form-control mt-1" style="background: #111; border: 1px solid #333; color: #fff; border-radius: 0;">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="active" class="form-check-input" id="active" {{ $product->active ? 'checked' : '' }}>
                        <label class="form-check-label" for="active" style="color: #aaa; letter-spacing: 2px; font-size: 0.8rem;">PRODUCTO ACTIVO</label>
                    </div>
                </div>

                <button type="submit" class="btn w-100" style="background: #fff; color: #000; letter-spacing: 3px; border-radius: 0;">GUARDAR CAMBIOS</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>