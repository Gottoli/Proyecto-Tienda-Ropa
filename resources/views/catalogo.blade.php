@extends('layout')

@section('contenido')

<div class="container py-5">
    <p style="letter-spacing: 4px; font-size: 0.8rem; color: #aaa;">COLECCIÓN 2026</p>
    <h2 style="font-weight: 300; letter-spacing: 4px;">CATÁLOGO</h2>
    <hr style="border-color: #222; margin: 2rem 0;">

    <div class="mb-4">
        <button onclick="filtrar('todos', 'todos')" class="btn-filtro activo" id="btn-todos">TODOS</button>
    
        <span style="color: #555; margin: 0 10px;">|</span>
    
        <span style="color: #aaa; letter-spacing: 3px; font-size: 0.75rem; margin-right: 10px;">HOMBRE:</span>
        <button onclick="filtrar('camperas', 'hombre')" class="btn-filtro" id="btn-camperas-hombre">CAMPERAS</button>
        <button onclick="filtrar('remeras', 'hombre')" class="btn-filtro" id="btn-remeras-hombre">REMERAS</button>
        <button onclick="filtrar('pantalones', 'hombre')" class="btn-filtro" id="btn-pantalones-hombre">PANTALONES</button>
        <button onclick="filtrar('buzos', 'hombre')" class="btn-filtro" id="btn-buzos-hombre">BUZOS</button>

        <span style="color: #555; margin: 0 10px;">|</span>

        <span style="color: #aaa; letter-spacing: 3px; font-size: 0.75rem; margin-right: 10px;">MUJER:</span>
        <button onclick="filtrar('camperas', 'mujer')" class="btn-filtro" id="btn-camperas-mujer">CAMPERAS</button>
        <button onclick="filtrar('remeras', 'mujer')" class="btn-filtro" id="btn-remeras-mujer">REMERAS</button>
        <button onclick="filtrar('pantalones', 'mujer')" class="btn-filtro" id="btn-pantalones-mujer">PANTALONES</button>
        <button onclick="filtrar('buzos', 'mujer')" class="btn-filtro" id="btn-buzos-mujer">BUZOS</button>
    </div>

    <div class="row g-4" id="productos">

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="hombre">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/remera1.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA NEGRA BÁSICA</p>
            <p style="color: #aaa;">$18.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="hombre">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">20% OFF</span>
                <img src="/img/remera2.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA OFF WHITE</p>
            <p style="color: #aaa;">$25.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="hombre">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/remera3.jpeg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA BALENCIAGA</p>
            <p style="color: #aaa;">$32.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="hombre">
            <div style="position: relative;">
                <img src="/img/remera4.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA AZUL</p>
            <p style="color: #aaa;">$20.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="hombre">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">15% OFF</span>
                <img src="/img/remera5.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA SUPREME</p>
            <p style="color: #aaa;">$28.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="pantalones" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/pantalon1.jpeg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">JEAN SLIM</p>
            <p style="color: #aaa;">$35.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="pantalones" data-genero="hombre mujer">
            <div style="position: relative;">
                <img src="/img/pantalon2.jpeg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">JEAN WIDE LEG</p>
            <p style="color: #aaa;">$38.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="pantalones" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">25% OFF</span>
                <img src="/img/pantalon3.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">JEAN NEGRO</p>
            <p style="color: #aaa;">$40.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="buzos" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/buzo1.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">BUZO ZIP NEGRO</p>
            <p style="color: #aaa;">$42.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="buzos" data-genero="hombre mujer">
            <div style="position: relative;">
                <img src="/img/buzo2.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">BUZO ZIP BLANCO</p>
            <p style="color: #aaa;">$45.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="buzos" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">10% OFF</span>
                <img src="/img/buzo3.jpeg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">BUZO Ralph Lauren</p>
            <p style="color: #aaa;">$48.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="camperas" data-genero="hombre mujer" >
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/campera1.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">CAMPERA OVERSIZE</p>
            <p style="color: #aaa;">$45.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="camperas" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">20% OFF</span>
                <img src="/img/campera2.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">CAMPERA CUERO</p>
            <p style="color: #aaa;">$65.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="camperas" data-genero="hombre mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/campera3.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">CAMPERA DENIM</p>
            <p style="color: #aaa;">$55.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="camperas" data-genero="hombre mujer">
            <div style="position: relative;">
                <img src="/img/campera4.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">CAMPERA BOMBER</p>
            <p style="color: #aaa;">$58.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/mremera1.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA MUJER BÁSICA</p>
            <p style="color: #aaa;">$18.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">20% OFF</span>
                <img src="/img/mremera2.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA MUJER CROP</p>
            <p style="color: #aaa;">$22.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #fff; color: #000; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">NUEVO</span>
                <img src="/img/mremera3.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA MUJER OVERSIZE</p>
            <p style="color: #aaa;">$25.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="mujer">
            <div style="position: relative;">
            <img src="/img/mremera4.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
        </div>
            <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA MUJER ESTAMPADA</p>
            <p style="color: #aaa;">$28.000</p>
        </div>

        <div class="col-md-4 producto" data-categoria="remeras" data-genero="mujer">
            <div style="position: relative;">
                <span style="position: absolute; top: 10px; left: 10px; background: #e00; color: #fff; font-size: 0.7rem; letter-spacing: 2px; padding: 4px 8px;">15% OFF</span>
                <img src="/img/meremera5.jpg" style="width: 100%; height: 450px; object-fit: contain; background: #111;">
            </div>
                    <p class="mt-2" style="letter-spacing: 2px; font-size: 0.9rem;">REMERA MUJER PREMIUM</p>
                    <p style="color: #aaa;">$32.000</p>
                

        <div class="col-12 text-center mt-5">
        <hr style="border-color: #222;">
        <p style="letter-spacing: 6px; font-size: 0.8rem; color: #aaa; margin-top: 3rem;">PRÓXIMAMENTE</p>
        <h3 style="font-weight: 300; letter-spacing: 8px; color: #fff;">NUEVOS PRODUCTOS EN CAMINO</h3>
        <p style="color: #aaa; font-size: 0.8rem; letter-spacing: 3px;">TEMPORADA INVIERNO 2026</p>
        </div>

    </div>


</div>

<style>
.btn-filtro {
    background: none;
    border: 1px solid #333;
    color: #aaa;
    letter-spacing: 3px;
    font-size: 0.75rem;
    padding: 8px 20px;
    margin-right: 8px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: all 0.3s;
}
.btn-filtro:hover, .btn-filtro.activo {
    border-color: #f0f0f0;
    color: #f0f0f0;
}
</style>

<script>
function filtrar(categoria, genero) {
    const productos = document.querySelectorAll('.producto');
    const botones = document.querySelectorAll('.btn-filtro');

    botones.forEach(btn => btn.classList.remove('activo'));

    productos.forEach(producto => {
        const catMatch = categoria === 'todos' || producto.dataset.categoria === categoria;
        const genMatch = genero === 'todos' || producto.dataset.genero.includes(genero);
        
        if (catMatch && genMatch) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none';
        }
    });
}

const params = new URLSearchParams(window.location.search);
const categoriaUrl = params.get('categoria');
const generoUrl = params.get('genero');
if (categoriaUrl || generoUrl) {
    filtrar(categoriaUrl || 'todos', generoUrl || 'todos');
}
</script>

@endsection