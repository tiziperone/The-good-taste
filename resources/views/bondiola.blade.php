<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Bondiolas</title>

  <!-- Conexión anticipada a Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark">

  @include('componentes.navbar')

  <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
    @include('componentes.botonesAtrasAdelante')
  </div>

  <hr class="border-warning border-2 opacity-100">

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center gap-4">

      @if(isset($bondiolas) && $bondiolas->count() > 0)
      @foreach($bondiolas as $bondiola)
      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">
          <img src="{{ asset($bondiola->url_imagen ? $bondiola->url_imagen : 'Img/BondiolaTarjetaSinPimenton.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $bondiola->nombre }}" loading="lazy">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ $bondiola->nombre }}</h5>
            <p class="card-text text-light flex-grow-1">{{ $bondiola->descripcion ?? 'Fiambre especial para compartir en picadas y comidas.' }}</p>

            <h4 class="fw-bold mb-3">
              ${{ number_format($bondiola->precio, 0, ',', '.') }}
            </h4>

            <div class="mt-auto">
              @if($bondiola->stock > 0)
              @auth
              <button type="button" class="btn btn-warning fw-bold text-dark btn-comprar-ahora" data-id="{{ $bondiola->id }}">Comprar</button>

              <button type="button" class="btn btn-outline-light ms-2 btn-agregar-carrito" data-id="{{ $bondiola->id }}">
                Agregar <i class="bi bi-cart"></i>
              </button>
              @else
              <button type="button" class="btn btn-warning fw-bold text-dark btn-requiere-auth">Comprar</button>
              <button type="button" class="btn btn-outline-light ms-2 btn-requiere-auth">
                Agregar <i class="bi bi-cart"></i>
              </button>
              @endauth
              @else
              <button type="button" class="btn btn-secondary fw-bold text-light w-100 disabled" disabled>
                <i class="bi bi-x-circle me-1"></i> Sin Stock
              </button>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="col-12 text-center text-light">
        <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary"></i>
        <p class="fs-5">Por el momento no tenemos bondiolas disponibles. ¡Vuelve pronto!</p>
      </div>
      @endif

    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <div id="toastCarrito" class="toast align-items-center text-bg-success border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
      <div class="d-flex p-2 align-items-center">
        <div class="toast-body flex-grow-1" id="toastMensaje"></div>
        <a href="{{ url('/carrito') }}" id="btnVerCarritoToast" class="btn btn-light btn-sm fw-bold me-2 shadow-sm text-success">Ver Carrito</a>
        <button type="button" class="btn-close btn-close-white m-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toastElement = document.getElementById('toastCarrito');
      const toast = new bootstrap.Toast(toastElement);
      const toastMensaje = document.getElementById('toastMensaje');
      const btnVerCarritoToast = document.getElementById('btnVerCarritoToast');

      document.querySelectorAll('.btn-requiere-auth').forEach(boton => {
        boton.addEventListener('click', function(e) {
          e.preventDefault();
          toastMensaje.innerHTML = 'Debes iniciar sesión para realizar una compra.';
          toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
          btnVerCarritoToast.classList.add('d-none');
          toast.show();
        });
      });

      document.querySelectorAll('.btn-agregar-carrito').forEach(boton => {
        boton.addEventListener('click', function() {
          const productoId = this.getAttribute('data-id');

          if (!productoId) {
            toastMensaje.innerHTML = "Error: ID de producto no válido.";
            toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
            btnVerCarritoToast.classList.add('d-none');
            toast.show();
            return;
          }

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
              if (data.success) {
                toastMensaje.innerHTML = `🛒 ${data.message}`;
                toastElement.className = 'toast align-items-center text-bg-success border-0 shadow';
                btnVerCarritoToast.classList.remove('d-none');
                toast.show();
              } else {
                toastMensaje.innerHTML = `⚠️ ${data.message}`;
                toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
                btnVerCarritoToast.classList.add('d-none');
                toast.show();
              }
            })
            .catch(error => {
              console.error('Error:', error);
              toastMensaje.innerHTML = "Hubo un problema al procesar la solicitud.";
              toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
              btnVerCarritoToast.classList.add('d-none');
              toast.show();
            });
        });
      });

      document.querySelectorAll('.btn-comprar-ahora').forEach(boton => {
        boton.addEventListener('click', function() {
          const productoId = this.getAttribute('data-id');

          if (!productoId) {
            toastMensaje.innerHTML = "Error: ID de producto no válido.";
            toastElement.className = 'toast align-items-center text-bg-danger border-0 shadow';
            toast.show();
            return;
          }

          window.location.href = "{{ route('compra.index') }}?producto_id=" + productoId;
        });
      });
    });
  </script>

  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')
</body>

</html>