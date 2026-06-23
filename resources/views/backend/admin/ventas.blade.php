@extends('layout')

@section('title', 'Panel de Ventas | LISBON™')

@section('contenido')

<div class="admin-subnav">
    <div class="container d-flex align-items-center gap-4">
        <span class="subnav-label">ADMIN</span>
        <a href="/admin">DASHBOARD</a>
        <a href="/admin/productos">PRODUCTOS</a>
        <a href="/admin/ventas" class="is-active">VENTAS</a>
        <a href="/admin/consultas">CONSULTAS</a>
        <a href="/admin/usuarios">USUARIOS</a>
    </div>
</div>

<div class="container py-5">

    <div style="margin-bottom: 3rem;">
        <p class="page-eyebrow">ADMIN / VENTAS</p>
        <h1 class="page-title" style="font-size: clamp(28px, 4vw, 48px);">PANEL DE VENTAS</h1>
    </div>

    {{-- Métricas --}}
    <div class="row g-0 mb-5" style="border: 1px solid var(--border);">
        <div class="col-md-4" style="padding: 2.2rem 2.5rem; border-right: 1px solid var(--border);">
            <p class="lisbon-label" style="margin-bottom: 0.6rem; font-size: 14px;">INGRESOS TOTALES</p>
            <p style="font-size: 3.4rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">${{ number_format($totalIngresos, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-4" style="padding: 2.2rem 2.5rem; border-right: 1px solid var(--border);">
            <p class="lisbon-label" style="margin-bottom: 0.6rem; font-size: 14px;">ÓRDENES COMPLETADAS</p>
            <p style="font-size: 3.4rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">{{ $totalOrdenes }}</p>
        </div>
        <div class="col-md-4" style="padding: 2.2rem 2.5rem;">
            <p class="lisbon-label" style="margin-bottom: 0.6rem; font-size: 14px;">UNIDADES VENDIDAS</p>
            <p style="font-size: 3.4rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">{{ $totalItems }}</p>
        </div>
    </div>

    {{-- Productos más vendidos --}}
    @if($topProductos->count() > 0)
    <div class="mb-5">
        <p class="lisbon-label" style="margin-bottom: 1.5rem; font-size: 14px;">"PRODUCTOS MÁS VENDIDOS"</p>
        <div style="border: 1px solid var(--border);">
            @foreach($topProductos as $i => $item)
            <div style="display:flex; align-items:center; padding: 20px 22px; border-bottom: 1px solid var(--border-sub); gap: 22px; {{ $loop->last ? 'border-bottom:none;' : '' }}">
                <span style="font-size: 13px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); width: 28px;">{{ $i + 1 }}</span>
                @if($item->product && $item->product->image)
                    <img src="/img/{{ $item->product->image }}" style="width:64px; height:64px; object-fit:cover; background:var(--bg-off); flex-shrink:0;">
                @else
                    <div style="width:64px; height:64px; background:var(--bg-off); flex-shrink:0;"></div>
                @endif
                <div style="flex:1; min-width:0;">
                    <p style="font-size: 17px; font-weight: 500; letter-spacing: 0.06em; margin: 0 0 4px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                        {{ $item->product ? strtoupper($item->product->name) : 'PRODUCTO ELIMINADO' }}
                    </p>
                    <p style="font-size: 14px; color: var(--text-3); letter-spacing: 0.05em; margin: 0;">
                        {{ $item->total_vendido }} unidades vendidas
                    </p>
                </div>
                <p style="font-size: 19px; font-weight: 400; letter-spacing: 0.03em; margin: 0; flex-shrink:0;">
                    ${{ number_format($item->total_ingresos, 0, ',', '.') }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Historial de órdenes --}}
    <p class="lisbon-label" style="margin-bottom: 1.5rem; font-size: 14px;">"HISTORIAL DE ÓRDENES"</p>

    @if($orders->isEmpty())
        <div style="border: 1px solid var(--border); padding: 4rem; text-align: center;">
            <p style="font-size: 16px; letter-spacing: 0.18em; color: var(--text-3);">AÚN NO HAY ÓRDENES REGISTRADAS.</p>
        </div>
    @else
        <p style="font-size: 13px; letter-spacing: 0.08em; color: var(--text-3); margin-bottom: 1rem;">
            HACÉ CLICK EN UNA ORDEN PARA VER EL DETALLE COMPLETO →
        </p>
        <div style="border: 1px solid var(--border); overflow-x: auto;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);"># ORDEN</th>
                        <th style="text-align:left; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);">COMPRADOR</th>
                        <th style="text-align:left; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);">PRODUCTOS</th>
                        <th style="text-align:left; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);">ESTADO</th>
                        <th style="text-align:right; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);">TOTAL</th>
                        <th style="text-align:right; padding:18px 20px; font-size:14px; font-weight:500; letter-spacing:0.16em; color:var(--text-3);">FECHA</th>
                        <th style="width:40px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="orden-row" onclick="toggleOrden({{ $order->id }})" style="border-top: 1px solid var(--border-sub); cursor:pointer;">
                        <td style="padding:20px 20px;">
                            <span style="font-size:15px; font-weight:500; letter-spacing:0.1em; color:var(--text);">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td style="padding:20px 20px;">
                            @if($order->user)
                                <p style="font-size:16px; font-weight:500; margin:0 0 3px; letter-spacing:0.04em;">{{ strtoupper($order->user->name) }}</p>
                                <p style="font-size:14px; color:var(--text-3); margin:0; letter-spacing:0.02em;">{{ $order->user->email }}</p>
                            @else
                                <span style="font-size:15px; color:var(--text-3);">Usuario eliminado</span>
                            @endif
                        </td>
                        <td style="padding:20px 20px; max-width:340px;">
                            @foreach($order->items as $item)
                            <div style="display:flex; align-items:center; gap:12px; margin-bottom:{{ $loop->last ? '0' : '10px' }};">
                                @if($item->product && $item->product->image)
                                    <img src="/img/{{ $item->product->image }}" style="width:44px; height:44px; object-fit:cover; background:var(--bg-off); flex-shrink:0;">
                                @endif
                                <div>
                                    <p style="font-size:15px; font-weight:500; letter-spacing:0.04em; margin:0 0 2px;">
                                        {{ $item->product ? strtoupper($item->product->name) : 'ELIMINADO' }}
                                    </p>
                                    <p style="font-size:13px; color:var(--text-3); margin:0; letter-spacing:0.06em;">
                                        @if($item->talle) TALLE {{ strtoupper($item->talle) }} · @endif
                                        x{{ $item->quantity }} · ${{ number_format($item->price, 0, ',', '.') }} c/u
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </td>
                        <td style="padding:20px 20px;">
                            <span class="{{ $order->estado === 'confirmado' ? 'badge-olive' : 'badge-muted' }}" style="font-size:12px; padding:4px 12px;">
                                {{ strtoupper($order->estado) }}
                            </span>
                        </td>
                        <td style="padding:20px 20px; text-align:right;">
                            <span style="font-size:18px; font-weight:500; letter-spacing:0.03em;">${{ number_format($order->total, 0, ',', '.') }}</span>
                        </td>
                        <td style="padding:20px 20px; text-align:right; white-space:nowrap;">
                            <p style="font-size:14px; color:var(--text-3); letter-spacing:0.04em; margin:0;">{{ $order->created_at->format('d/m/Y') }}</p>
                            <p style="font-size:13px; color:var(--border); letter-spacing:0.02em; margin:0;">{{ $order->created_at->format('H:i') }}</p>
                        </td>
                        <td style="padding:20px 16px; text-align:center;">
                            <span id="arrow-{{ $order->id }}" style="display:inline-block; font-size:18px; color:var(--text-3); transition:transform 0.2s;">›</span>
                        </td>
                    </tr>

                    {{-- Detalle desplegable --}}
                    <tr id="detalle-{{ $order->id }}" style="display:none; background:var(--bg-off); border-top:1px solid var(--border-sub);">
                        <td colspan="7" style="padding: 30px 36px;">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <p class="lisbon-label" style="font-size:13px; margin-bottom:12px;">DATOS DEL COMPRADOR</p>
                                    <p style="font-size:16px; font-weight:500; margin:0 0 4px;">{{ strtoupper($order->nombre_completo ?? '—') }}</p>
                                    <p style="font-size:14px; color:var(--text-3); margin:0;">DNI: {{ $order->dni ?? '—' }}</p>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <p class="lisbon-label" style="font-size:13px; margin-bottom:12px;">DIRECCIÓN DE ENVÍO</p>
                                    <p style="font-size:16px; font-weight:500; margin:0 0 4px;">{{ $order->direccion ?? '—' }}</p>
                                    <p style="font-size:14px; color:var(--text-3); margin:0;">
                                        {{ $order->ciudad ?? '' }}{{ $order->localidad ? ' · ' . $order->localidad : '' }}
                                    </p>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <p class="lisbon-label" style="font-size:13px; margin-bottom:12px;">MÉTODO DE PAGO</p>
                                    <p style="font-size:16px; font-weight:500; margin:0 0 4px;">
                                        {{ $order->metodo_pago === 'tarjeta' ? 'TARJETA DE CRÉDITO' : 'TRANSFERENCIA BANCARIA' }}
                                    </p>
                                    @if($order->metodo_pago === 'tarjeta')
                                        <span style="background:#000; color:#fff; font-size:11px; font-weight:500; letter-spacing:0.12em; padding:4px 10px; display:inline-block;">
                                            3 CUOTAS SIN INTERÉS
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

<style>
.orden-row:hover td { background: var(--bg-off); }
</style>

<script>
function toggleOrden(id) {
    var row = document.getElementById('detalle-' + id);
    var arrow = document.getElementById('arrow-' + id);
    var isOpen = row.style.display === 'table-row';
    row.style.display = isOpen ? 'none' : 'table-row';
    arrow.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(90deg)';
}
</script>

@endsection
