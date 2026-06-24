@extends('layout')

@section('title', 'Checkout - Finalizar Compra | LISBON™')

@section('contenido')

<div class="container py-5">

    <a href="/carrito" style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); text-decoration: none; transition: opacity 0.15s;"
       onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">
        ← VOLVER AL CARRITO
    </a>

    <div style="margin-top: 2rem; margin-bottom: 3rem;">
        <p class="page-eyebrow">"FINALIZAR COMPRA"</p>
        <h1 class="page-title" style="font-size: clamp(30px, 4vw, 52px); margin-bottom: 0;">CHECKOUT</h1>
    </div>

    @if(session('error'))
        <div class="lisbon-error" style="margin-bottom: 2rem;">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="lisbon-error" style="margin-bottom: 2rem;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/carrito/confirmar" method="POST">
        @csrf

        <div class="row g-5">

            {{-- ── Columna izquierda: formulario ── --}}
            <div class="col-lg-7">

                {{-- Datos personales --}}
                <div style="margin-bottom: 3rem;">
                    <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.8rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">"DATOS PERSONALES"</p>

                    <div class="mb-4">
                        <label class="lisbon-label">NOMBRE COMPLETO</label>
                        <input type="text" name="nombre_completo" value="{{ old('nombre_completo', auth()->user()->name) }}"
                               class="lisbon-input" placeholder="Ej: Juan García" style="font-size: 16px;">
                        @error('nombre_completo') <small style="color:#8A4A3A; font-size:13px;">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="lisbon-label">DNI</label>
                        <input type="text" name="dni" value="{{ old('dni', auth()->user()->dni) }}"
                               class="lisbon-input" placeholder="Ej: 38123456"
                               style="font-size: 16px;" maxlength="9" inputmode="numeric"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        @error('dni') <small style="color:#8A4A3A; font-size:13px;">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Dirección de entrega --}}
                <div style="margin-bottom: 3rem;">
                    <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.8rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">"DIRECCIÓN DE ENTREGA"</p>

                    @php
                        $tieneDireccionGuardada = !empty(auth()->user()->direccion);
                        $modoDireccion = old('direccion_modo', $tieneDireccionGuardada ? 'guardada' : 'nueva');
                    @endphp

                    @if($tieneDireccionGuardada)
                    <div class="d-flex flex-column gap-3 mb-4">
                        <label class="pago-opcion">
                            <input type="radio" name="direccion_modo" value="guardada" {{ $modoDireccion === 'guardada' ? 'checked' : '' }}
                                   onchange="toggleDireccionModo(this)" style="display:none;">
                            <div class="pago-card {{ $modoDireccion === 'guardada' ? 'is-selected' : '' }}" id="card-dir-guardada">
                                <div style="display:flex; align-items:center; justify-content:space-between;">
                                    <div>
                                        <p style="font-size:14px; font-weight:500; letter-spacing:0.12em; margin:0 0 4px;">USAR MI DIRECCIÓN GUARDADA</p>
                                        <p style="font-size:13px; color:var(--text-3); margin:0; letter-spacing:0.04em;">
                                            {{ auth()->user()->direccion }}{{ auth()->user()->ciudad ? ', ' . auth()->user()->ciudad : '' }}{{ auth()->user()->localidad ? ', ' . auth()->user()->localidad : '' }}
                                        </p>
                                    </div>
                                    <div class="pago-check" id="check-dir-guardada">✓</div>
                                </div>
                            </div>
                        </label>
                        <label class="pago-opcion">
                            <input type="radio" name="direccion_modo" value="nueva" {{ $modoDireccion === 'nueva' ? 'checked' : '' }}
                                   onchange="toggleDireccionModo(this)" style="display:none;">
                            <div class="pago-card {{ $modoDireccion === 'nueva' ? 'is-selected' : '' }}" id="card-dir-nueva">
                                <div style="display:flex; align-items:center; justify-content:space-between;">
                                    <p style="font-size:14px; font-weight:500; letter-spacing:0.12em; margin:0;">ENVIAR A OTRA DIRECCIÓN</p>
                                    <div class="pago-check" id="check-dir-nueva">✓</div>
                                </div>
                            </div>
                        </label>
                    </div>
                    @endif

                    <div id="direccionFields" style="{{ $modoDireccion === 'guardada' ? 'display:none;' : '' }}">
                        <div class="mb-4">
                            <label class="lisbon-label">DIRECCIÓN</label>
                            <input type="text" name="direccion" id="inputDireccion"
                                   value="{{ old('direccion', $modoDireccion === 'guardada' ? auth()->user()->direccion : '') }}"
                                   class="lisbon-input" placeholder="Calle, número, piso/depto"
                                   style="font-size: 16px;">
                            @error('direccion') <small style="color:#8A4A3A; font-size:13px;">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">CIUDAD</label>
                                <input type="text" name="ciudad" id="inputCiudad"
                                       value="{{ old('ciudad', $modoDireccion === 'guardada' ? auth()->user()->ciudad : '') }}"
                                       class="lisbon-input" placeholder="Ej: Buenos Aires"
                                       style="font-size: 16px;">
                                @error('ciudad') <small style="color:#8A4A3A; font-size:13px;">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="lisbon-label">LOCALIDAD / BARRIO <span style="font-weight:300;">(opcional)</span></label>
                                <input type="text" name="localidad" id="inputLocalidad"
                                       value="{{ old('localidad', $modoDireccion === 'guardada' ? auth()->user()->localidad : '') }}"
                                       class="lisbon-input" placeholder="Ej: Palermo"
                                       style="font-size: 16px;">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Método de pago --}}
                <div style="margin-bottom: 3rem;">
                    <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.8rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">"MÉTODO DE PAGO"</p>

                    <div class="d-flex flex-column gap-3">

                        {{-- Opción transferencia --}}
                        <label class="pago-opcion" id="lbl-transferencia">
                            <input type="radio" name="metodo_pago" value="transferencia"
                                   {{ old('metodo_pago', 'transferencia') === 'transferencia' ? 'checked' : '' }}
                                   onchange="selectPago(this)"
                                   style="display:none;">
                            <div class="pago-card {{ old('metodo_pago', 'transferencia') === 'transferencia' ? 'is-selected' : '' }}" id="card-transferencia">
                                <div style="display:flex; align-items:center; justify-content:space-between;">
                                    <div>
                                        <p style="font-size:14px; font-weight:500; letter-spacing:0.12em; margin:0 0 4px;">TRANSFERENCIA BANCARIA</p>
                                        <p style="font-size:13px; color:var(--text-3); margin:0; letter-spacing:0.04em;">Abonás al finalizar y enviamos al acreditar.</p>
                                    </div>
                                    <div class="pago-check" id="check-transferencia">✓</div>
                                </div>
                            </div>
                        </label>

                        {{-- Opción tarjeta --}}
                        <label class="pago-opcion" id="lbl-tarjeta">
                            <input type="radio" name="metodo_pago" value="tarjeta"
                                   {{ old('metodo_pago') === 'tarjeta' ? 'checked' : '' }}
                                   onchange="selectPago(this)"
                                   style="display:none;">
                            <div class="pago-card {{ old('metodo_pago') === 'tarjeta' ? 'is-selected' : '' }}" id="card-tarjeta">
                                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
                                    <div>
                                        <p style="font-size:14px; font-weight:500; letter-spacing:0.12em; margin:0 0 4px;">TARJETA DE CRÉDITO</p>
                                        <p style="font-size:13px; color:var(--text-3); margin:0; letter-spacing:0.04em;">Todas las tarjetas aceptadas.</p>
                                    </div>
                                    <div style="display:flex; align-items:center; gap:12px;">
                                        <span style="background:#000; color:#fff; font-size:11px; font-weight:500; letter-spacing:0.16em; padding:5px 12px; white-space:nowrap;">
                                            3 CUOTAS SIN INTERÉS
                                        </span>
                                        <div class="pago-check" id="check-tarjeta">✓</div>
                                    </div>
                                </div>
                            </div>
                        </label>

                    </div>
                    @error('metodo_pago') <small style="color:#8A4A3A; font-size:13px; margin-top:8px; display:block;">{{ $message }}</small> @enderror

                    {{-- Formulario de tarjeta (visual, no se envía al backend) --}}
                    <div id="tarjetaFormWrap" style="display:{{ old('metodo_pago') === 'tarjeta' ? 'block' : 'none' }}; border:1px solid var(--border); border-top:none; padding:24px 22px; background:var(--bg-off);">

                        <div class="mb-4">
                            <label class="lisbon-label">NÚMERO DE TARJETA</label>
                            <div style="position:relative;">
                                <input type="text" id="cardNumero" class="lisbon-input" placeholder="0000 0000 0000 0000"
                                       inputmode="numeric" maxlength="19" style="font-size:16px; letter-spacing:0.06em; padding-right:54px;">
                                <span id="cardBrand" style="position:absolute; right:14px; top:50%; transform:translateY(-50%); font-size:11px; font-weight:600; letter-spacing:0.1em; color:var(--text-3);"></span>
                            </div>
                            <small id="cardNumeroError" style="color:#8A4A3A; font-size:12px; margin-top:5px; display:none;">INGRESÁ LOS 16 DÍGITOS DE LA TARJETA.</small>
                        </div>

                        <div class="mb-4">
                            <label class="lisbon-label">NOMBRE EN LA TARJETA</label>
                            <input type="text" id="cardNombre" class="lisbon-input" placeholder="Como figura en la tarjeta"
                                   style="font-size:16px; text-transform:uppercase;">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="lisbon-label">VENCIMIENTO</label>
                                <input type="text" id="cardVencimiento" class="lisbon-input" placeholder="MM/AA"
                                       inputmode="numeric" maxlength="5" style="font-size:16px;">
                            </div>
                            <div class="col-6">
                                <label class="lisbon-label">CVV</label>
                                <input type="text" id="cardCvv" class="lisbon-input" placeholder="123"
                                       inputmode="numeric" maxlength="4" style="font-size:16px;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── Columna derecha: resumen del pedido ── --}}
            <div class="col-lg-5">
                <div style="position: sticky; top: 80px;">

                    <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.28em; color: var(--text); margin-bottom: 1.8rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">"RESUMEN DEL PEDIDO"</p>

                    <div style="border: 1px solid var(--border);">
                        @foreach($cartItems as $item)
                        <div style="display:flex; align-items:center; gap:14px; padding:16px; border-bottom:1px solid var(--border-sub);">
                            @if($item->product->image)
                                <img src="/img/{{ $item->product->image }}"
                                     style="width:60px; height:60px; object-fit:cover; background:var(--bg-off); flex-shrink:0;">
                            @else
                                <div style="width:60px; height:60px; background:var(--bg-off); flex-shrink:0;"></div>
                            @endif
                            <div style="flex:1; min-width:0;">
                                <p style="font-size:13px; font-weight:500; letter-spacing:0.08em; margin:0 0 3px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                    {{ strtoupper($item->product->name) }}
                                </p>
                                <p style="font-size:12px; color:var(--text-3); margin:0; letter-spacing:0.1em;">
                                    @if($item->talle) TALLE {{ strtoupper($item->talle) }} · @endif
                                    x{{ $item->quantity }}
                                </p>
                            </div>
                            <p style="font-size:14px; font-weight:500; margin:0; flex-shrink:0;">
                                ${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            </p>
                        </div>
                        @endforeach

                        <div style="padding:20px 16px;">
                            <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                                <span style="font-size:13px; color:var(--text-3); letter-spacing:0.08em;">SUBTOTAL</span>
                                <span style="font-size:13px; color:var(--text-3);">${{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                                <span style="font-size:13px; color:var(--text-3); letter-spacing:0.08em;">ENVÍO</span>
                                <span style="font-size:13px; color:var(--text-3);">A COORDINAR</span>
                            </div>
                            <hr style="border-color:var(--border); margin:14px 0;">
                            <div style="display:flex; justify-content:space-between; align-items:baseline;">
                                <span style="font-size:12px; font-weight:500; letter-spacing:0.2em;">TOTAL</span>
                                <span style="font-size:26px; font-weight:300; letter-spacing:0.04em;">${{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div id="cuotasInfo" style="display:none; border:1px solid var(--border); border-top:none; padding:14px 16px; background:var(--bg-off);">
                        <p style="font-size:12px; font-weight:500; letter-spacing:0.16em; margin:0 0 6px;">3 CUOTAS SIN INTERÉS</p>
                        <p style="font-size:20px; font-weight:300; margin:0;">
                            ${{ number_format($total / 3, 0, ',', '.') }} <span style="font-size:13px; color:var(--text-3);">/ cuota</span>
                        </p>
                    </div>

                    <button type="submit" class="btn-lisbon-filled" style="width:100%; text-align:center; padding:18px; margin-top:20px; font-size:14px; letter-spacing:0.16em;">
                        CONFIRMAR COMPRA →
                    </button>

                    <p style="font-size:11px; color:var(--text-3); letter-spacing:0.1em; text-align:center; margin-top:16px; line-height:1.8;">
                        Al confirmar aceptás nuestros<br>
                        <a href="/terminos" style="color:var(--text-3); text-decoration:underline;">Términos y Condiciones</a>
                    </p>

                </div>
            </div>

        </div>
    </form>

</div>

<style>
.pago-opcion { cursor: pointer; display: block; }
.pago-card {
    border: 1px solid var(--border);
    padding: 18px 20px;
    transition: border-color 0.18s, background 0.18s;
}
.pago-card:hover { border-color: var(--text-3); }
.pago-card.is-selected {
    border-color: var(--text);
    border-width: 2px;
    background: var(--bg-off);
}
.pago-check {
    width: 24px; height: 24px;
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 500;
    color: transparent;
    transition: all 0.15s;
    flex-shrink: 0;
}
.pago-card.is-selected .pago-check {
    background: var(--text);
    border-color: var(--text);
    color: #fff;
}
</style>

<script>
function selectPago(radio) {
    document.querySelectorAll('input[name="metodo_pago"]').forEach(function(r) {
        document.getElementById('card-' + r.value).classList.remove('is-selected');
    });
    document.getElementById('card-' + radio.value).classList.add('is-selected');

    var cuotasInfo = document.getElementById('cuotasInfo');
    var tarjetaForm = document.getElementById('tarjetaFormWrap');
    var mostrar = radio.value === 'tarjeta';
    cuotasInfo.style.display = mostrar ? 'block' : 'none';
    tarjetaForm.style.display = mostrar ? 'block' : 'none';
}
// Inicializar estado al cargar
document.addEventListener('DOMContentLoaded', function() {
    var checked = document.querySelector('input[name="metodo_pago"]:checked');
    if (checked) selectPago(checked);
});

// ── Formulario visual de tarjeta ──
var cardNumeroInput = document.getElementById('cardNumero');
if (cardNumeroInput) {
    cardNumeroInput.addEventListener('input', function() {
        var digits = this.value.replace(/\D/g, '').slice(0, 16);
        var grupos = digits.match(/.{1,4}/g) || [];
        this.value = grupos.join(' ');

        var brand = document.getElementById('cardBrand');
        if (digits.startsWith('4')) brand.textContent = 'VISA';
        else if (/^5[1-5]/.test(digits)) brand.textContent = 'MASTERCARD';
        else if (/^3[47]/.test(digits)) brand.textContent = 'AMEX';
        else brand.textContent = '';
    });
    cardNumeroInput.addEventListener('blur', function() {
        var digits = this.value.replace(/\D/g, '');
        var error = document.getElementById('cardNumeroError');
        error.style.display = (digits.length > 0 && digits.length < 16) ? 'block' : 'none';
    });

    document.getElementById('cardVencimiento').addEventListener('input', function() {
        var digits = this.value.replace(/\D/g, '').slice(0, 4);
        this.value = digits.length > 2 ? digits.slice(0, 2) + '/' + digits.slice(2) : digits;
    });

    document.getElementById('cardCvv').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 4);
    });
}

// ── Dirección de entrega ──
var savedDireccion = @json(auth()->user()->direccion ?? '');
var savedCiudad    = @json(auth()->user()->ciudad ?? '');
var savedLocalidad = @json(auth()->user()->localidad ?? '');

function toggleDireccionModo(radio) {
    document.querySelectorAll('input[name="direccion_modo"]').forEach(function(r) {
        document.getElementById('card-dir-' + r.value).classList.remove('is-selected');
    });
    document.getElementById('card-dir-' + radio.value).classList.add('is-selected');

    var fields = document.getElementById('direccionFields');
    if (radio.value === 'guardada') {
        fields.style.display = 'none';
        document.getElementById('inputDireccion').value = savedDireccion;
        document.getElementById('inputCiudad').value = savedCiudad;
        document.getElementById('inputLocalidad').value = savedLocalidad;
    } else {
        fields.style.display = 'block';
        document.getElementById('inputDireccion').value = '';
        document.getElementById('inputCiudad').value = '';
        document.getElementById('inputLocalidad').value = '';
    }
}
</script>

@endsection
