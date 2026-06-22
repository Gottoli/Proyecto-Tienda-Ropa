@extends('layout')

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
        <div class="col-md-4" style="padding: 2rem 2.5rem; border-right: 1px solid var(--border);">
            <p class="lisbon-label" style="margin-bottom: 0.5rem;">INGRESOS TOTALES</p>
            <p style="font-size: 3rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">${{ number_format($totalIngresos, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-4" style="padding: 2rem 2.5rem; border-right: 1px solid var(--border);">
            <p class="lisbon-label" style="margin-bottom: 0.5rem;">ÓRDENES COMPLETADAS</p>
            <p style="font-size: 3rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">{{ $totalOrdenes }}</p>
        </div>
        <div class="col-md-4" style="padding: 2rem 2.5rem;">
            <p class="lisbon-label" style="margin-bottom: 0.5rem;">UNIDADES VENDIDAS</p>
            <p style="font-size: 3rem; font-weight: 300; letter-spacing: 0.04em; margin: 0; line-height: 1;">{{ $totalItems }}</p>
        </div>
    </div>

    {{-- Productos más vendidos --}}
    @if($topProductos->count() > 0)
    <div class="mb-5">
        <p class="lisbon-label" style="margin-bottom: 1.5rem;">"PRODUCTOS MÁS VENDIDOS"</p>
        <div style="border: 1px solid var(--border);">
            @foreach($topProductos as $i => $item)
            <div style="display:flex; align-items:center; padding: 16px 20px; border-bottom: 1px solid var(--border-sub); gap: 20px; {{ $loop->last ? 'border-bottom:none;' : '' }}">
                <span style="font-size: 11px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); width: 24px;">{{ $i + 1 }}</span>
                @if($item->product && $item->product->image)
                    <img src="/img/{{ $item->product->image }}" style="width:52px; height:52px; object-fit:cover; background:var(--bg-off); flex-shrink:0;">
                @else
                    <div style="width:52px; height:52px; background:var(--bg-off); flex-shrink:0;"></div>
                @endif
                <div style="flex:1; min-width:0;">
                    <p style="font-size: 14px; font-weight: 500; letter-spacing: 0.08em; margin: 0 0 2px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                        {{ $item->product ? strtoupper($item->product->name) : 'PRODUCTO ELIMINADO' }}
                    </p>
                    <p style="font-size: 12px; color: var(--text-3); letter-spacing: 0.06em; margin: 0;">
                        {{ $item->total_vendido }} unidades vendidas
                    </p>
                </div>
                <p style="font-size: 15px; font-weight: 400; letter-spacing: 0.04em; margin: 0; flex-shrink:0;">
                    ${{ number_format($item->total_ingresos, 0, ',', '.') }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Historial de órdenes --}}
    <p class="lisbon-label" style="margin-bottom: 1.5rem;">"HISTORIAL DE ÓRDENES"</p>

    @if($orders->isEmpty())
        <div style="border: 1px solid var(--border); padding: 4rem; text-align: center;">
            <p style="font-size: 13px; letter-spacing: 0.18em; color: var(--text-3);">AÚN NO HAY ÓRDENES REGISTRADAS.</p>
        </div>
    @else
        <div style="border: 1px solid var(--border); overflow-x: auto;">
            <table class="lisbon-table" style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:14px 18px;"># ORDEN</th>
                        <th style="text-align:left; padding:14px 18px;">COMPRADOR</th>
                        <th style="text-align:left; padding:14px 18px;">PRODUCTOS</th>
                        <th style="text-align:left; padding:14px 18px;">ESTADO</th>
                        <th style="text-align:right; padding:14px 18px;">TOTAL</th>
                        <th style="text-align:right; padding:14px 18px;">FECHA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr style="border-top: 1px solid var(--border-sub);">
                        <td style="padding:16px 18px;">
                            <span style="font-size:12px; font-weight:500; letter-spacing:0.14em; color:var(--text-3);">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td style="padding:16px 18px;">
                            @if($order->user)
                                <p style="font-size:14px; font-weight:500; margin:0 0 2px; letter-spacing:0.06em;">{{ strtoupper($order->user->name) }}</p>
                                <p style="font-size:12px; color:var(--text-3); margin:0; letter-spacing:0.04em;">{{ $order->user->email }}</p>
                            @else
                                <span style="font-size:13px; color:var(--text-3);">Usuario eliminado</span>
                            @endif
                        </td>
                        <td style="padding:16px 18px; max-width:320px;">
                            @foreach($order->items as $item)
                            <div style="display:flex; align-items:center; gap:10px; margin-bottom:{{ $loop->last ? '0' : '8px' }};">
                                @if($item->product && $item->product->image)
                                    <img src="/img/{{ $item->product->image }}" style="width:36px; height:36px; object-fit:cover; background:var(--bg-off); flex-shrink:0;">
                                @endif
                                <div>
                                    <p style="font-size:13px; font-weight:500; letter-spacing:0.06em; margin:0 0 1px;">
                                        {{ $item->product ? strtoupper($item->product->name) : 'ELIMINADO' }}
                                    </p>
                                    <p style="font-size:11px; color:var(--text-3); margin:0; letter-spacing:0.1em;">
                                        @if($item->talle) TALLE {{ strtoupper($item->talle) }} · @endif
                                        x{{ $item->quantity }} · ${{ number_format($item->price, 0, ',', '.') }} c/u
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </td>
                        <td style="padding:16px 18px;">
                            <span class="{{ $order->estado === 'confirmado' ? 'badge-olive' : 'badge-muted' }}">
                                {{ strtoupper($order->estado) }}
                            </span>
                        </td>
                        <td style="padding:16px 18px; text-align:right;">
                            <span style="font-size:15px; font-weight:500; letter-spacing:0.04em;">${{ number_format($order->total, 0, ',', '.') }}</span>
                        </td>
                        <td style="padding:16px 18px; text-align:right; white-space:nowrap;">
                            <p style="font-size:12px; color:var(--text-3); letter-spacing:0.06em; margin:0;">{{ $order->created_at->format('d/m/Y') }}</p>
                            <p style="font-size:11px; color:var(--border); letter-spacing:0.04em; margin:0;">{{ $order->created_at->format('H:i') }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

@endsection
