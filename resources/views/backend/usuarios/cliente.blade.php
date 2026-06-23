@extends('layout')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">MI CUENTA</span>
        <a href="/cliente" class="is-active">PERFIL</a>
        <a href="/carrito">CARRITO</a>
        <a href="/catalogo">CATÁLOGO</a>
    </div>
</div>

<div class="container py-5">

    <p class="page-eyebrow">PANEL PERSONAL</p>
    <h2 class="page-title" style="font-size: 2rem; margin-bottom: 2.5rem;">MI CUENTA</h2>

    @if(session('success'))
        <div class="lisbon-success" style="margin-bottom: 2rem;">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="lisbon-error" style="margin-bottom: 2rem;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">

            <form action="/cliente/perfil" method="POST" id="perfilForm">
                @csrf
                @method('PUT')

                {{-- ── Datos personales ── --}}
                <div class="profile-panel">
                    <div class="profile-panel-header">
                        <p class="profile-panel-title">{{ strtoupper(auth()->user()->name) }}</p>
                        <button type="button" class="btn-edit-toggle" data-target="datos">EDITAR</button>
                    </div>

                    {{-- Modo lectura --}}
                    <div class="profile-view" data-view="datos">
                        <div class="profile-row">
                            <span class="profile-row-label">NOMBRE COMPLETO</span>
                            <span class="profile-row-value">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-row-label">CORREO ELECTRÓNICO</span>
                            <span class="profile-row-value">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-row-label">TELÉFONO</span>
                            <span class="profile-row-value">{{ auth()->user()->telefono ?? '— Sin agregar —' }}</span>
                        </div>
                        <div class="profile-row" style="border-bottom: none;">
                            <span class="profile-row-label">DNI</span>
                            <span class="profile-row-value">{{ auth()->user()->dni ?? '— Sin agregar —' }}</span>
                        </div>
                    </div>

                    {{-- Modo edición --}}
                    <div class="profile-edit" data-edit="datos" style="display:none;">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">NOMBRE COMPLETO</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="lisbon-input" style="font-size:16px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">CORREO ELECTRÓNICO</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="lisbon-input" style="font-size:16px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">TELÉFONO</label>
                                <input type="text" name="telefono" value="{{ old('telefono', auth()->user()->telefono) }}" placeholder="Ej: +54 9 11 1234 5678" class="lisbon-input" style="font-size:16px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">DNI</label>
                                <input type="text" name="dni" value="{{ old('dni', auth()->user()->dni) }}" maxlength="9" inputmode="numeric"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="lisbon-input" style="font-size:16px;">
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-lisbon-filled" style="padding:13px 30px;">GUARDAR CAMBIOS</button>
                            <button type="button" class="btn-lisbon-ghost btn-edit-cancel" data-target="datos" style="padding:13px 30px;">CANCELAR</button>
                        </div>
                    </div>
                </div>

                {{-- ── Dirección ── --}}
                <div class="profile-panel">
                    <div class="profile-panel-header">
                        <p class="profile-panel-title">DIRECCIÓN DE ENVÍO</p>
                        <button type="button" class="btn-edit-toggle" data-target="direccion">
                            {{ auth()->user()->direccion ? 'EDITAR' : 'AGREGAR' }}
                        </button>
                    </div>

                    {{-- Modo lectura --}}
                    <div class="profile-view" data-view="direccion">
                        @if(auth()->user()->direccion)
                            <div class="address-card">
                                <div class="address-pin">📍</div>
                                <div style="flex:1;">
                                    <p style="margin:0 0 4px;">
                                        <span style="font-weight:500; letter-spacing:0.04em;">{{ strtoupper(auth()->user()->name) }}</span>
                                        <span class="badge-olive" style="margin-left:10px; font-size:10px;">PREDETERMINADA</span>
                                    </p>
                                    <p style="margin:0; color:var(--text-3); font-size:15px; letter-spacing:0.02em;">
                                        {{ auth()->user()->direccion }}{{ auth()->user()->ciudad ? ', ' . auth()->user()->ciudad : '' }}{{ auth()->user()->localidad ? ', ' . auth()->user()->localidad : '' }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <p style="font-size:14px; color:var(--text-3); letter-spacing:0.04em; padding: 8px 0;">
                                AÚN NO AGREGASTE UNA DIRECCIÓN DE ENVÍO.
                            </p>
                        @endif
                    </div>

                    {{-- Modo edición --}}
                    <div class="profile-edit" data-edit="direccion" style="display:none;">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="lisbon-label">DIRECCIÓN</label>
                                <input type="text" name="direccion" value="{{ old('direccion', auth()->user()->direccion) }}" placeholder="Calle, número, piso/depto" class="lisbon-input" style="font-size:16px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">CIUDAD</label>
                                <input type="text" name="ciudad" value="{{ old('ciudad', auth()->user()->ciudad) }}" placeholder="Ej: Buenos Aires" class="lisbon-input" style="font-size:16px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">LOCALIDAD / BARRIO</label>
                                <input type="text" name="localidad" value="{{ old('localidad', auth()->user()->localidad) }}" placeholder="Ej: Palermo" class="lisbon-input" style="font-size:16px;">
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-lisbon-filled" style="padding:13px 30px;">GUARDAR CAMBIOS</button>
                            <button type="button" class="btn-lisbon-ghost btn-edit-cancel" data-target="direccion" style="padding:13px 30px;">CANCELAR</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

        {{-- ── Sidebar: resumen + accesos ── --}}
        <div class="col-lg-4">
            <div class="profile-panel" style="background: var(--bg-off);">
                <p class="profile-panel-title" style="margin-bottom: 20px;">RESUMEN</p>
                <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom:14px;">
                    <span style="font-size:13px; color:var(--text-3); letter-spacing:0.08em;">PRODUCTOS EN CARRITO</span>
                    <span style="font-size:20px; font-weight:300;">{{ $totalItems }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom:14px;">
                    <span style="font-size:13px; color:var(--text-3); letter-spacing:0.08em;">TOTAL EN CARRITO</span>
                    <span style="font-size:20px; font-weight:300;">${{ number_format($totalImporte, 0, ',', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-baseline" style="margin-bottom:24px;">
                    <span style="font-size:13px; color:var(--text-3); letter-spacing:0.08em;">CLIENTE DESDE</span>
                    <span style="font-size:16px; font-weight:400;">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                </div>
                <a href="/carrito" class="btn-lisbon d-block text-center" style="margin-bottom:10px;">VER CARRITO</a>
                <a href="/catalogo" class="btn-lisbon-ghost d-block text-center">VER CATÁLOGO</a>
            </div>
        </div>
    </div>

    {{-- ── Historial de compras ── --}}
    @if($orders->count() > 0)
    <hr class="lisbon-hr">
    <p class="page-eyebrow" style="margin-bottom: 1.5rem;">HISTORIAL</p>
    <h5 style="font-weight: 300; letter-spacing: 4px; color: var(--text); margin-bottom: 2rem;">MIS COMPRAS</h5>

    @foreach($orders as $order)
    <div class="lisbon-card" style="padding: 1.5rem; margin-bottom: 1rem;">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <p class="lisbon-label" style="margin-bottom: 4px;">ORDEN #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>
                <p style="color: var(--text-2); font-size: 0.85rem;">{{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="text-end">
                <p class="lisbon-label" style="margin-bottom: 4px;">TOTAL</p>
                <p style="color: var(--text); font-size: 1rem; letter-spacing: 2px;">${{ number_format($order->total, 0, ',', '.') }}</p>
            </div>
            <span class="badge-olive">{{ strtoupper($order->estado) }}</span>
        </div>

        <hr class="lisbon-hr" style="margin: 1rem 0;">

        <table class="lisbon-table">
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
    @endif

</div>

<style>
.profile-panel {
    background: #fff;
    border: 1px solid var(--border);
    padding: 28px 32px;
    margin-bottom: 24px;
}
.profile-panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}
.profile-panel-title {
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0.04em;
    margin: 0;
    color: var(--text);
}
.btn-edit-toggle {
    background: none;
    border: 1px solid var(--border);
    padding: 9px 20px;
    font-family: 'Space Grotesk', sans-serif;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.14em;
    cursor: pointer;
    color: var(--text);
    transition: background 0.15s, color 0.15s;
}
.btn-edit-toggle:hover { background: var(--text); color: #fff; }
.profile-row {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    padding: 16px 0;
    border-bottom: 1px solid var(--border-sub);
    flex-wrap: wrap;
    gap: 8px;
}
.profile-row-label {
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.18em;
    color: var(--text-3);
}
.profile-row-value {
    font-size: 16px;
    color: var(--text);
    letter-spacing: 0.02em;
}
.address-card {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    border: 1px solid var(--border);
    padding: 18px 20px;
}
.address-pin { font-size: 22px; line-height: 1; }
</style>

<script>
document.querySelectorAll('.btn-edit-toggle').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var target = btn.dataset.target;
        document.querySelector('[data-view="' + target + '"]').style.display = 'none';
        document.querySelector('[data-edit="' + target + '"]').style.display = 'block';
        btn.style.display = 'none';
    });
});
document.querySelectorAll('.btn-edit-cancel').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var target = btn.dataset.target;
        document.querySelector('[data-view="' + target + '"]').style.display = 'block';
        document.querySelector('[data-edit="' + target + '"]').style.display = 'none';
        document.querySelector('.btn-edit-toggle[data-target="' + target + '"]').style.display = 'inline-block';
    });
});
</script>

@endsection
