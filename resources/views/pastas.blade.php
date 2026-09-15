@extends('layouts.app')

@section('titulo', 'The Good Taste - Pastas')

@section('contenido')
<div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
  @include('componentes.botonesAtrasAdelante')
</div>

<hr class="border-warning border-2 opacity-100">

<div class="container mt-5 mb-5">
  @if(isset($pastas) && $pastas->count() > 0)
  @php
  $grupos = $pastas->groupBy(function($item) {
  $nombre = mb_strtolower($item->nombre);
  if (str_contains($nombre, 'fideo')) return 'Fideos';
  if (str_contains($nombre, 'raviol')) return 'Ravioles';
  if (str_contains($nombre, 'sorrentino')) return 'Sorrentinos';
  return null;
  })->filter(function($items, $key) {
  return !empty($key);
  });
  @endphp

  @forelse($grupos as $categoria => $productos)
  <div class="row mt-4 mb-3">
    <div class="col-12">
      <h2 class="text-warning fw-bold border-bottom border-secondary pb-2"><i class="bi bi-tag-fill me-2 fs-4"></i>{{ $categoria }}</h2>
    </div>
  </div>
  <div class="row justify-content-start g-4 mb-5">
    @foreach($productos as $pasta)
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">
        <img src="{{ asset($pasta->url_imagen ? $pasta->url_imagen : 'Img/SorrentinosTarjeta.webp') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $pasta->nombre }}" loading="lazy">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold text-warning">{{ $pasta->nombre }}</h5>
          <p class="card-text text-light flex-grow-1">{{ $pasta->descripcion ?? 'Exquisitas pastas artesanales hechas con mucha dedicación.' }}</p>
          <h4 class="fw-bold mb-3">${{ number_format($pasta->precio, 0, ',', '.') }}</h4>
          <div class="mt-auto">
            @if($pasta->stock > 0)
            @auth
            <button type="button" class="btn btn-warning fw-bold text-dark btn-comprar-ahora" data-id="{{ $pasta->id }}">Comprar</button>
            <button type="button" class="btn btn-outline-light ms-2 btn-agregar-carrito" data-id="{{ $pasta->id }}">Agregar <i class="bi bi-cart"></i></button>
            @else
            <button type="button" class="btn btn-warning fw-bold text-dark btn-requiere-auth">Comprar</button>
            <button type="button" class="btn btn-outline-light ms-2 btn-requiere-auth">Agregar <i class="bi bi-cart"></i></button>
            @endauth
            @else
            <button type="button" class="btn btn-secondary fw-bold text-light w-100 disabled" disabled><i class="bi bi-x-circle me-1"></i> Sin Stock</button>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @empty
  <div class="col-12 text-center text-light">
    <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary"></i>
    <p class="fs-5">Por el momento no tenemos pastas disponibles en el catálogo. ¡Vuelve pronto!</p>
  </div>
  @endforelse
  @else
  <div class="col-12 text-center text-light">
    <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary"></i>
    <p class="fs-5">Por el momento no tenemos pastas disponibles en el catálogo. ¡Vuelve pronto!</p>
  </div>
  @endif
</div>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
  <div id="toastCarrito" class="toast align-items-center text-bg-success border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
    <div class="d-flex p-2 align-items-center">
      <div class="toast-body flex-grow-1" id="toastMensaje"></div>
      <a href="{{ url('/carrito') }}" id="btnVerCarritoToast" class="btn btn-light btn-sm fw-bold me-2 shadow-sm text-success">Ver Carrito</a>
      <button type="button" class="btn-close btn-close-white m-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Este código se ejecuta exclusivamente en esta vista
  document.addEventListener('DOMContentLoaded', function() {
    const toastElement = document.getElementById('toastCarrito');
    const toast = new bootstrap.Toast(toastElement);
    const toastMensaje = document.getElementById('toastMensaje');
    const btnVerCarritoToast = document.getElementById('btnVerCarritoToast');

    document.querySelectorAll('.btn-requiere-auth').forEach(boton => {
      boton.addEventListener('click', function(e) {
        e.preventDefault();
        toastMensaje.innerHTML = '⚠️ Debes iniciar sesión para realizar una compra.';
        toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
        btnVerCarritoToast.classList.add('d-none');
        toast.show();
      });
    });

    document.querySelectorAll('.btn-agregar-carrito').forEach(boton => {
      boton.addEventListener('click', function() {
        const productoId = this.getAttribute('data-id');
        if (!productoId) return;

        fetch("{{ route('carrito.agregar') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              producto_id: productoId
            })
          })
          .then(response => response.json())
          .then(data => {
            toastMensaje.innerHTML = data.success ? `🛒 ${data.message}` : `⚠️ ${data.message}`;
            toastElement.className = data.success ? 'toast align-items-center text-bg-success border-0 shadow' : 'toast align-items-center text-bg-danger border-0 shadow';
            data.success ? btnVerCarritoToast.classList.remove('d-none') : btnVerCarritoToast.classList.add('d-none');
            toast.show();
          });
      });
    });

    document.querySelectorAll('.btn-comprar-ahora').forEach(boton => {
      boton.addEventListener('click', function() {
        const productoId = this.getAttribute('data-id');
        if (productoId) window.location.href = "{{ route('compra.index') }}?producto_id=" + productoId;
      });
    });
  });
</script>
@endsection