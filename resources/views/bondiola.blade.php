<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Bondiola</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark">

  @include('componentes.navbar')

  <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
    @include('componentes.botonesAtrasAdelante')

    @auth
    @if(auth()->user()->role === 'admin')
    <button type="button" class="btn btn-success fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">
      <i class="bi bi-plus-circle-fill me-2"></i> Agregar Producto
    </button>
    @endif
    @endauth
  </div>

  <hr class="border-warning border-2 opacity-100">

  <div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 shadow" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i> <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center gap-4">

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && $bondiolaClasica)
          <form action="{{ route('productos.destroy', $bondiolaClasica->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto del catálogo?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow" title="Eliminar Producto">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset('Img/BondiolaTarjetaSinPimenton.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Bondiola Clásica">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Bondiola Clásica (1kg)</h5>
            <p class="card-text text-light flex-grow-1">Fiambre especial para compartir en picadas y comidas, acompañalo con lo que más te guste, o con quien más te guste 😉.</p>

            <div class="mb-3">
              @if($bondiolaClasica)
              @if($bondiolaClasica->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($bondiolaClasica->stock <= $bondiolaClasica->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $bondiolaClasica->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $bondiolaClasica->stock }})</span>
                @endif
                @else
                @auth
                @if(auth()->user()->role === 'admin')
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
                @endauth
                @endif
            </div>

            <h4 class="fw-bold mb-3">
              {{ $bondiolaClasica ? '$' . number_format($bondiolaClasica->precio, 0, ',', '.') : '$30.000' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
                Agregar <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && $bondiolaPimenton)
          <form action="{{ route('productos.destroy', $bondiolaPimenton->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto del catálogo?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow" title="Eliminar Producto">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset('Img/BondiolaTarjetaConPimenton.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Bondiola con Pimentón">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Bondiola al Pimentón (1kg)</h5>
            <p class="card-text text-light flex-grow-1">Para aquellos que aman el pimentón, ésta es su elección ideal. El mismo y exquisito fiambre, pero con un toque especial 👌.</p>

            <div class="mb-3">
              @if($bondiolaPimenton)
              @if($bondiolaPimenton->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($bondiolaPimenton->stock <= $bondiolaPimenton->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $bondiolaPimenton->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $bondiolaPimenton->stock }})</span>
                @endif
                @else
                @auth
                @if(auth()->user()->role === 'admin')
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
                @endauth
                @endif
            </div>

            <h4 class="fw-bold mb-3">
              {{ $bondiolaPimenton ? '$' . number_format($bondiolaPimenton->precio, 0, ',', '.') : '$30.000' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
                Agregar <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white border-warning" style="border-radius: 15px;">
        <div class="modal-header border-secondary">
          <h5 class="modal-title fw-bold text-warning" id="modalLabel">Añadir Nueva Bondiola al Menú</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('productos.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label text-warning small fw-bold">Nombre Exacto del Producto</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="nombre" name="nombre" placeholder="Ej: Bondiola Clásica (1kg)" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label text-warning small fw-bold">Descripción Corta</label>
              <textarea class="form-control bg-secondary text-white border-0" id="descripcion" name="descripcion" rows="2" placeholder="Contanos qué trae este fiambre artesanal..."></textarea>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label text-warning small fw-bold">Precio de Venta ($)</label>
              <input type="number" class="form-control bg-secondary text-white border-0" id="precio" name="precio" placeholder="30000" required>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label for="stock" class="form-label text-warning small fw-bold">Stock Disponible</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock" name="stock" placeholder="15" required>
              </div>
              <div class="col-6 mb-3">
                <label for="stock_minimo" class="form-label text-warning small fw-bold">Límite Stock Bajo</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock_minimo" name="stock_minimo" value="10" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="url_imagen" class="form-label text-warning small fw-bold">Ruta de Imagen (Opcional)</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="url_imagen" name="url_imagen" placeholder="Img/BondiolaTarjetaSinPimenton.png">
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning fw-bold text-dark">Guardar Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://unpkg.com/twemoji@latest/dist/twemoji.min.js" crossorigin="anonymous"></script>
  <script>
    twemoji.parse(document.body);
  </script>
  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')
</body>

</html>