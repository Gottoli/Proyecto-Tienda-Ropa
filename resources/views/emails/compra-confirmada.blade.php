<x-mail::message>
# ¡Gracias por tu compra, {{ $order->nombre_completo }}!

Confirmamos tu orden **#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}**.

<x-mail::table>
| Producto | Talle | Cantidad | Subtotal |
| :------- | :---: | :------: | -------: |
@foreach($order->items as $item)
| {{ $item->product->name ?? 'Producto eliminado' }} | {{ $item->talle ?? '—' }} | {{ $item->quantity }} | ${{ number_format($item->price * $item->quantity, 0, ',', '.') }} |
@endforeach
</x-mail::table>

**Total: ${{ number_format($order->total, 0, ',', '.') }}**

**Envío a:** {{ $order->direccion }}, {{ $order->ciudad }}{{ $order->localidad ? ', ' . $order->localidad : '' }}

**Método de pago:** {{ $order->metodo_pago === 'tarjeta' ? 'Tarjeta de crédito (3 cuotas sin interés)' : 'Transferencia bancaria' }}

<x-mail::button :url="config('app.url') . '/cliente'">
Ver mis compras
</x-mail::button>

Gracias por elegirnos,<br>
{{ config('app.name') }}
</x-mail::message>
