@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos" class="is-active">PRODUCTOS</a>
        <a href="/admin/ventas">VENTAS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="/admin/productos" style="color: var(--text-3); letter-spacing: 2px; font-size: 13px; text-decoration: none; transition: color 0.2s;"
               onmouseover="this.style.color='var(--text)'" onmouseout="this.style.color='var(--text-3)'">
                ← VOLVER A PRODUCTOS
            </a>

            <div style="margin-top: 1.5rem; margin-bottom: 2.5rem;">
                <p class="page-eyebrow">ADMIN / PRODUCTOS</p>
                <h2 class="page-title" style="font-size: 2.2rem;">NUEVO PRODUCTO</h2>
            </div>

            @if($errors->any())
                <div class="lisbon-error" style="margin-bottom: 2rem;">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="/admin/productos" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nombre --}}
                <div class="mb-4">
                    <label class="lisbon-label">NOMBRE DEL PRODUCTO</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="lisbon-input" style="font-size: 16px;">
                    @error('name') <small style="color: #8A4A3A; font-size: 13px; letter-spacing: 0.05em;">{{ $message }}</small> @enderror
                </div>

                {{-- Descripción --}}
                <div class="mb-4">
                    <label class="lisbon-label">DESCRIPCIÓN</label>
                    <textarea name="description" rows="4" class="lisbon-input" style="height: auto; resize: vertical; font-size: 16px;">{{ old('description') }}</textarea>
                </div>

                {{-- Imagen principal (obligatoria) --}}
                <div class="mb-3">
                    <label class="lisbon-label">
                        IMAGEN PRINCIPAL
                        <span style="color: #B03020; margin-left: 4px;">*</span>
                    </label>
                    <input type="file" name="imagen_principal" accept="image/*" class="lisbon-input"
                           style="padding: 12px; cursor: pointer; font-size: 14px;"
                           id="imgPrincipalInput" onchange="previewImg(this,'prevPrincipal')">
                    <small style="color: var(--text-3); font-size: 13px; margin-top: 4px; display: block;">
                        Obligatoria. Formatos: JPG, PNG, WEBP. Máx. 4MB.
                    </small>
                    @error('imagen_principal')
                        <small style="color: #8A4A3A; font-size: 13px;">{{ $message }}</small>
                    @enderror
                    <div id="prevPrincipal" style="display:none; margin-top:12px;">
                        <img id="prevPrincipalImg" src="" style="height:160px; object-fit:contain; border:1px solid var(--border); background:var(--bg-off); padding:6px;">
                    </div>
                </div>

                {{-- Imágenes adicionales --}}
                <div class="mb-5">
                    <label class="lisbon-label">IMÁGENES ADICIONALES <span style="font-weight: 300;">(opcional — para carrusel)</span></label>
                    <input type="file" name="imagenes_extra[]" accept="image/*" multiple class="lisbon-input"
                           style="padding: 12px; cursor: pointer; font-size: 14px;"
                           onchange="previewMultiple(this,'prevExtras')">
                    <small style="color: var(--text-3); font-size: 13px; margin-top: 4px; display: block;">Podés subir hasta 5 imágenes extra.</small>
                    <div id="prevExtras" style="display:flex; gap:8px; flex-wrap:wrap; margin-top:12px;"></div>
                </div>

                <hr class="lisbon-hr">

                {{-- Precio --}}
                <div class="mb-4">
                    <label class="lisbon-label">PRECIO</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="lisbon-input" min="0" step="1" style="font-size: 16px;">
                    @error('price') <small style="color: #8A4A3A; font-size: 13px;">{{ $message }}</small> @enderror
                </div>

                {{-- Talles --}}
                <div class="mb-3">
                    <label class="lisbon-label">TALLES DISPONIBLES</label>
                    <input type="text" name="talles" id="tallesInput" value="{{ old('talles') }}"
                           placeholder="Ej: XS,S,M,L,XL  —  28,30,32,34  —  ÚNICO"
                           class="lisbon-input" style="font-size: 16px;"
                           oninput="generarStockTalles(this.value, {})">
                    <small style="color: var(--text-3); font-size: 13px; margin-top: 4px; display: block;">
                        Separados por coma. Al escribirlos aparecerá el stock por talle.
                    </small>
                </div>

                {{-- Stock por talle (dinámico) --}}
                <div id="stockTallesWrap" class="mb-5" style="display:none;">
                    <label class="lisbon-label">STOCK POR TALLE</label>
                    <div id="stockTallesGrid" style="display:flex; gap:16px; flex-wrap:wrap; margin-top:10px;"></div>
                </div>

                <hr class="lisbon-hr">

                {{-- Categoría --}}
                <div class="mb-4">
                    <label class="lisbon-label">CATEGORÍA</label>
                    <select name="category_id" class="lisbon-input" style="appearance: none; cursor: pointer; font-size: 16px;">
                        <option value="">Seleccioná una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small style="color: #8A4A3A; font-size: 13px;">{{ $message }}</small> @enderror
                </div>

                {{-- Género --}}
                <div class="mb-5">
                    <label class="lisbon-label">
                        GÉNERO
                        <span style="color: #B03020; margin-left: 4px;">*</span>
                    </label>
                    <div class="d-flex gap-4" style="margin-top: 10px;">
                        @foreach(['hombre' => 'HOMBRE', 'mujer' => 'MUJER', 'unisex' => 'UNISEX'] as $value => $label)
                            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                                <input type="radio" name="genero" value="{{ $value }}" {{ old('genero') === $value ? 'checked' : '' }}
                                       style="width: 18px; height: 18px; accent-color: var(--text); cursor: pointer;">
                                <span style="font-size: 14px; letter-spacing: 0.1em; color: var(--text);">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('genero') <small style="color: #8A4A3A; font-size: 13px;">{{ $message }}</small> @enderror
                </div>

                {{-- Activo --}}
                <div class="mb-5 d-flex align-items-center gap-3">
                    <input type="checkbox" name="active" id="active" checked
                           style="width: 18px; height: 18px; accent-color: var(--text); cursor: pointer;">
                    <label for="active" class="lisbon-label" style="margin: 0; cursor: pointer; font-size: 13px;">PRODUCTO ACTIVO</label>
                </div>

                <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 16px; font-size: 14px;">
                    CREAR PRODUCTO
                </button>
            </form>

        </div>
    </div>
</div>

<script>
function generarStockTalles(val, existentes) {
    var wrap = document.getElementById('stockTallesWrap');
    var grid = document.getElementById('stockTallesGrid');
    var talles = val.split(',').map(function(t){ return t.trim(); }).filter(function(t){ return t !== ''; });
    if (talles.length === 0) { wrap.style.display = 'none'; grid.innerHTML = ''; return; }
    wrap.style.display = 'block';
    grid.innerHTML = '';
    talles.forEach(function(t) {
        var v = existentes[t] !== undefined ? existentes[t] : 0;
        var div = document.createElement('div');
        div.style.cssText = 'display:flex;flex-direction:column;align-items:center;gap:8px;';
        div.innerHTML = '<label style="font-size:12px;font-weight:500;letter-spacing:0.18em;color:var(--text-3);">' + t + '</label>'
            + '<input type="number" name="stock_talles[' + t + ']" value="' + v + '" min="0" '
            + 'style="width:76px;text-align:center;border:1px solid var(--border);padding:10px;font-family:inherit;font-size:16px;outline:none;">';
        grid.appendChild(div);
    });
}
function previewImg(input, containerId) {
    var container = document.getElementById(containerId);
    var img = document.getElementById(containerId + 'Img');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) { img.src = e.target.result; container.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
function previewMultiple(input, containerId) {
    var container = document.getElementById(containerId);
    container.innerHTML = '';
    if (!input.files) return;
    Array.from(input.files).slice(0,5).forEach(function(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.cssText = 'height:110px;object-fit:contain;border:1px solid var(--border);background:var(--bg-off);padding:4px;';
            container.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>

@endsection
