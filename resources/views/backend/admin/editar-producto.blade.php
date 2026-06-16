@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos" class="is-active">PRODUCTOS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <a href="/admin/productos" style="color: var(--text-3); letter-spacing: 2px; font-size: 0.72rem; text-decoration: none; transition: color 0.2s;"
               onmouseover="this.style.color='var(--olive)'" onmouseout="this.style.color='var(--text-3)'">
                ← VOLVER A PRODUCTOS
            </a>

            <div style="margin-top: 1.5rem; margin-bottom: 2.5rem;">
                <p class="page-eyebrow">ADMIN / PRODUCTOS</p>
                <h2 class="page-title" style="font-size: 2rem;">EDITAR PRODUCTO</h2>
            </div>

            @if($errors->any())
                <div class="lisbon-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="/admin/productos/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="lisbon-label">NOMBRE</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="lisbon-input">
                    @error('name') <small style="color: #8A4A3A; font-size: 0.78rem;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="lisbon-label">DESCRIPCIÓN</label>
                    <textarea name="description" rows="3" class="lisbon-input" style="height: auto; resize: vertical;">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lisbon-label">PRECIO</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="lisbon-input">
                        @error('price') <small style="color: #8A4A3A; font-size: 0.78rem;">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lisbon-label">STOCK</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="lisbon-input">
                        @error('stock') <small style="color: #8A4A3A; font-size: 0.78rem;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="lisbon-label">TALLES DISPONIBLES</label>
                    <input type="text" name="talles" value="{{ old('talles', $product->talles) }}" placeholder="Ej: XS,S,M,L,XL" class="lisbon-input">
                    <small style="color: var(--text-3); font-size: 0.72rem; letter-spacing: 1px; margin-top: 4px; display: block;">Separados por coma</small>
                </div>

                <div class="mb-4">
                    <label class="lisbon-label">CATEGORÍA</label>
                    <select name="category_id" class="lisbon-input" style="appearance: none; cursor: pointer;">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small style="color: #8A4A3A; font-size: 0.78rem;">{{ $message }}</small> @enderror
                </div>

                <div class="mb-5 d-flex align-items-center gap-3">
                    <input type="checkbox" name="active" id="active" {{ $product->active ? 'checked' : '' }}
                        style="width: 16px; height: 16px; accent-color: var(--olive); cursor: pointer;">
                    <label for="active" class="lisbon-label" style="margin: 0; cursor: pointer;">PRODUCTO ACTIVO</label>
                </div>

                <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 14px;">
                    GUARDAR CAMBIOS
                </button>
            </form>

        </div>
    </div>
</div>

@endsection
