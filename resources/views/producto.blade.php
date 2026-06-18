@extends('layout')

@section('contenido')

<div class="container py-5">

    <a href="/catalogo"
       style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); text-decoration: none; transition: opacity 0.15s;"
       onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">
        ← VOLVER AL CATÁLOGO
    </a>

    <hr class="lisbon-hr">

    <div class="row g-0 g-lg-5">

        {{-- ── Imagen / Carousel ── --}}
        <div class="col-lg-6">
            @php
                $allImages = $product->all_images;
                $hasMultiple = count($allImages) > 1;
            @endphp

            @if($hasMultiple)
                {{-- Carousel para múltiples imágenes --}}
                <div class="product-carousel" id="productCarousel">
                    <div class="carousel-track" id="carouselTrack">
                        @foreach($allImages as $img)
                            <div class="carousel-slide">
                                <img src="/img/{{ $img }}"
                                     style="width: 100%; height: 700px; object-fit: contain; background: var(--bg-off); display: block; user-select: none;">
                            </div>
                        @endforeach
                    </div>

                    {{-- Dots --}}
                    <div class="carousel-dots" id="carouselDots">
                        @foreach($allImages as $i => $img)
                            <button class="carousel-dot {{ $i === 0 ? 'is-active' : '' }}"
                                    onclick="goToSlide({{ $i }})"
                                    aria-label="Imagen {{ $i + 1 }}"></button>
                        @endforeach
                    </div>

                    {{-- Flechas --}}
                    <button class="carousel-arrow carousel-prev" onclick="prevSlide()" aria-label="Anterior">‹</button>
                    <button class="carousel-arrow carousel-next" onclick="nextSlide()" aria-label="Siguiente">›</button>
                </div>

                {{-- Miniaturas --}}
                <div class="carousel-thumbs" id="carouselThumbs">
                    @foreach($allImages as $i => $img)
                        <button class="thumb-btn {{ $i === 0 ? 'is-active' : '' }}"
                                onclick="goToSlide({{ $i }})">
                            <img src="/img/{{ $img }}"
                                 style="width: 100%; height: 100%; object-fit: contain; background: var(--bg-off);">
                        </button>
                    @endforeach
                </div>

            @elseif(count($allImages) === 1)
                <img src="/img/{{ $allImages[0] }}"
                     style="width: 100%; height: 700px; object-fit: contain; background: var(--bg-off); display: block;">
            @else
                <div style="width: 100%; height: 700px; background: var(--bg-off); display: flex; align-items: center; justify-content: center;">
                    <span style="color: var(--border); font-size: 12px; letter-spacing: 0.28em;">SIN IMAGEN</span>
                </div>
            @endif
        </div>

        {{-- ── Info ── --}}
        <div class="col-lg-6 pt-5 pt-lg-0">
            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.26em; color: var(--text-3); margin-bottom: 1rem;">{{ strtoupper($product->category->name) }}</p>
            <h1 style="font-size: clamp(30px, 4.5vw, 52px); font-weight: 300; letter-spacing: 0.06em; color: var(--text); line-height: 1.1; margin: 0 0 1.4rem;">
                {{ strtoupper($product->name) }}
            </h1>
            <p style="font-size: 24px; font-weight: 300; letter-spacing: 0.06em; color: var(--text); margin-bottom: 2.2rem;">
                ${{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p style="font-size: 17px; color: var(--text-3); line-height: 1.85; margin-bottom: 1.5rem; letter-spacing: 0.02em;">
                {{ $product->description }}
            </p>

            <p style="font-size: 12px; font-weight: 500; letter-spacing: 0.2em; color: var(--text-3); margin-bottom: 2rem;">
                STOCK DISPONIBLE: {{ $product->stock }}
            </p>

            <hr class="lisbon-hr" style="margin: 1.5rem 0 2rem;">

            @php $tallesArr = $product->talles ? array_map('trim', explode(',', $product->talles)) : []; @endphp

            @auth
                @if(auth()->user()->rol === 'cliente')
                    <form action="/carrito/agregar/{{ $product->id }}" method="POST" data-add-to-cart>
                        @csrf

                        @if($tallesArr)
                            <div class="mb-4">
                                <p class="lisbon-label" style="margin-bottom: 14px;">SELECCIONÁ TALLE</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach($tallesArr as $talle)
                                        <label style="cursor: pointer;">
                                            <input type="radio" name="talle" value="{{ $talle }}" style="display: none;" required>
                                            <span class="talle-btn">{{ $talle }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn-lisbon-filled" style="width: 100%; text-align: center; padding: 18px;">
                            AGREGAR AL CARRITO
                        </button>
                    </form>
                @else
                    {{-- Admin: talles visibles, sin compra --}}
                    @if($tallesArr)
                        <div class="mb-4">
                            <p class="lisbon-label" style="margin-bottom: 14px;">TALLES DISPONIBLES</p>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach($tallesArr as $talle)
                                    <span class="talle-btn" style="cursor: default; opacity: .7;">{{ $talle }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif
            @else
                {{-- Guest: talles visibles, botón de login --}}
                @if($tallesArr)
                    <div class="mb-4">
                        <p class="lisbon-label" style="margin-bottom: 14px;">TALLES DISPONIBLES</p>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach($tallesArr as $talle)
                                <span class="talle-btn" style="cursor: default; opacity: .7;">{{ $talle }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
                <a href="/login" class="btn-lisbon-filled d-block text-center" style="padding: 18px;">
                    AGREGAR AL CARRITO
                </a>
            @endauth
        </div>
    </div>

</div>

<style>
/* ── Size selector ── */
.talle-btn {
    border: 1px solid var(--border);
    color: var(--text-3);
    padding: 12px 22px;
    font-family: 'Space Grotesk', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 0.14em;
    display: inline-block;
    cursor: pointer;
    transition: all 0.15s;
}
.talle-btn:hover { border-color: var(--text); color: var(--text); }
input[type="radio"]:checked + .talle-btn {
    border-color: var(--text);
    background: var(--text);
    color: #fff;
}

/* ── Carousel ── */
.product-carousel {
    position: relative;
    overflow: hidden;
    background: var(--bg-off);
    touch-action: pan-y;
    cursor: grab;
}
.product-carousel:active { cursor: grabbing; }

.carousel-track {
    display: flex;
    transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}
.carousel-slide {
    min-width: 100%;
    flex-shrink: 0;
}

/* Dots */
.carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    padding: 16px 0 8px;
    background: var(--bg-off);
}
.carousel-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--border);
    border: none;
    cursor: pointer;
    padding: 0;
    transition: background 0.2s, transform 0.2s;
}
.carousel-dot.is-active {
    background: var(--text);
    transform: scale(1.3);
}

/* Arrows */
.carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.85);
    border: 1px solid var(--border);
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    color: var(--text);
    transition: background 0.15s;
    z-index: 2;
    line-height: 1;
    padding: 0;
}
.carousel-arrow:hover { background: #fff; }
.carousel-prev { left: 12px; }
.carousel-next { right: 12px; }

/* Thumbs */
.carousel-thumbs {
    display: flex;
    gap: 8px;
    margin-top: 8px;
}
.thumb-btn {
    width: 72px;
    height: 72px;
    border: 1px solid var(--border);
    background: none;
    padding: 0;
    cursor: pointer;
    transition: border-color 0.15s;
    overflow: hidden;
    flex-shrink: 0;
}
.thumb-btn.is-active { border-color: var(--text); border-width: 2px; }
.thumb-btn:hover { border-color: var(--text-3); }
</style>

<script>
@if($hasMultiple)
(function () {
    const track     = document.getElementById('carouselTrack');
    const dots      = document.querySelectorAll('.carousel-dot');
    const thumbs    = document.querySelectorAll('.thumb-btn');
    const total     = {{ count($allImages) }};
    let current     = 0;
    let startX      = 0;
    let isDragging  = false;

    function goToSlide(index) {
        current = Math.max(0, Math.min(index, total - 1));
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        dots.forEach((d, i)   => d.classList.toggle('is-active', i === current));
        thumbs.forEach((t, i) => t.classList.toggle('is-active', i === current));
    }

    window.goToSlide = goToSlide;
    window.prevSlide = () => goToSlide(current > 0 ? current - 1 : total - 1);
    window.nextSlide = () => goToSlide(current < total - 1 ? current + 1 : 0);

    // Swipe / drag
    const carousel = document.getElementById('productCarousel');

    carousel.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    carousel.addEventListener('touchend', e => {
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 50) dx < 0 ? window.nextSlide() : window.prevSlide();
    });

    carousel.addEventListener('mousedown', e => { isDragging = true; startX = e.clientX; e.preventDefault(); });
    document.addEventListener('mouseup', e => {
        if (!isDragging) return;
        isDragging = false;
        const dx = e.clientX - startX;
        if (Math.abs(dx) > 50) dx < 0 ? window.nextSlide() : window.prevSlide();
    });

    // Keyboard
    document.addEventListener('keydown', e => {
        if (e.key === 'ArrowLeft')  window.prevSlide();
        if (e.key === 'ArrowRight') window.nextSlide();
    });
})();
@endif
</script>

@endsection
