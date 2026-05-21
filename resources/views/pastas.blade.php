<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image/png">
  <title>The Good Taste - Pastas</title>

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
      <i class="bi bi-plus-circle-fill me-2"></i> Agregar Pasta
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
    <div class="row justify-content-center g-4">

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && isset($ravioles))
          <form action="{{ route('productos.destroy', $ravioles->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset(isset($ravioles) && $ravioles->url_imagen ? $ravioles->url_imagen : 'Img/RaviolesTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Ravioles">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ isset($ravioles) ? $ravioles->nombre : 'Ravioles (1 docena)' }}</h5>
            <p class="card-text text-light flex-grow-1">{{ isset($ravioles) && $ravioles->descripcion ? $ravioles->descripcion : 'Deliciosos ravioles rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.' }}</p>

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              @if(isset($ravioles))
              @if($ravioles->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($ravioles->stock <= $ravioles->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $ravioles->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $ravioles->stock }})</span>
                @endif
                @else
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
            </div>
            @endif
            @endauth

            <h4 class="fw-bold mb-3">
              {{ isset($ravioles) ? '$' . number_format($ravioles->precio, 0, ',', '.') : '$3.800' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">Agregar <i class="bi bi-cart"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && isset($sorrentinos))
          <form action="{{ route('productos.destroy', $sorrentinos->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset(isset($sorrentinos) && $sorrentinos->url_imagen ? $sorrentinos->url_imagen : 'Img/SorrentinosTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Sorrentinos">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ isset($sorrentinos) ? $sorrentinos->nombre : 'Sorrentinos (1 docena)' }}</h5>
            <p class="card-text text-light flex-grow-1">{{ isset($sorrentinos) && $sorrentinos->descripcion ? $sorrentinos->descripcion : 'Deliciosos sorrentinos rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.' }}</p>

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              @if(isset($sorrentinos))
              @if($sorrentinos->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($sorrentinos->stock <= $sorrentinos->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $sorrentinos->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $sorrentinos->stock }})</span>
                @endif
                @else
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
            </div>
            @endif
            @endauth

            <h4 class="fw-bold mb-3">
              {{ isset($sorrentinos) ? '$' . number_format($sorrentinos->precio, 0, ',', '.') : '$4.000' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">Agregar <i class="bi bi-cart"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && isset($fideos))
          <form action="{{ route('productos.destroy', $fideos->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset(isset($fideos) && $fideos->url_imagen ? $fideos->url_imagen : 'Img/FideosTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Fideos">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ isset($fideos) ? $fideos->nombre : 'Fideos (500g)' }}</h5>
            <p class="card-text text-light flex-grow-1">{{ isset($fideos) && $fideos->descripcion ? $fideos->descripcion : 'Fideos de alta calidad, ideales para preparar platos sabrosos con una exquisita salsa.' }}</p>

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              @if(isset($fideos))
              @if($fideos->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($fideos->stock <= $fideos->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $fideos->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $fideos->stock }})</span>
                @endif
                @else
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
            </div>
            @endif
            @endauth

            <h4 class="fw-bold mb-3">
              {{ isset($fideos) ? '$' . number_format($fideos->precio, 0, ',', '.') : '$2.500' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">Agregar <i class="bi bi-cart"></i></a>
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
          <h5 class="modal-title fw-bold text-warning" id="modalLabel">Añadir Nueva Pasta al Menú</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('productos.storePasta') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label text-warning small fw-bold">Nombre del Producto</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="nombre" name="nombre" placeholder="Ej: Tallarines Caseros (1kg)" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label text-warning small fw-bold">Descripción Corta</label>
              <textarea class="form-control bg-secondary text-white border-0" id="descripcion" name="descripcion" rows="2" placeholder="Deliciosas pastas artesanales..."></textarea>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label text-warning small fw-bold">Precio de Venta ($)</label>
              <input type="number" class="form-control bg-secondary text-white border-0" id="precio" name="precio" placeholder="3800" required>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label for="stock" class="form-label text-warning small fw-bold">Stock Disponible</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock" name="stock" placeholder="30" required>
              </div>
              <div class="col-6 mb-3">
                <label for="stock_minimo" class="form-label text-warning small fw-bold">Límite Stock Bajo</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock_minimo" name="stock_minimo" value="10" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="url_imagen" class="form-label text-warning small fw-bold">Ruta de Imagen (Opcional)</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="url_imagen" name="url_imagen" placeholder="Img/RaviolesTarjeta.png">
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning fw-bold text-dark">Guardar Pasta</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>