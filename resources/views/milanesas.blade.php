<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Milanesas</title>

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
      <i class="bi bi-plus-circle-fill me-2"></i> Agregar Milanesa
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
          @if(auth()->user()->role === 'admin' && $milaCarne)
          <form action="{{ route('productos.destroy', $milaCarne->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset($milaCarne && $milaCarne->url_imagen ? $milaCarne->url_imagen : 'Img/milanesa de carne sin freir.jpeg') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Milanesa de carne">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ $milaCarne ? $milaCarne->nombre : 'Milanesa de Carne (1kg.)' }}</h5>
            <p class="card-text text-light flex-grow-1">{{ $milaCarne && $milaCarne->descripcion ? $milaCarne->descripcion : 'Milanesa lista para freír, fresca y hecha en el día, acompañala con lo que más te guste.' }}</p>

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              @if($milaCarne)
              @if($milaCarne->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($milaCarne->stock <= $milaCarne->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $milaCarne->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $milaCarne->stock }})</span>
                @endif
                @else
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
            </div>
            @endif
            @endauth

            <h4 class="fw-bold mb-3">
              {{ $milaCarne ? '$' . number_format($milaCarne->precio, 0, ',', '.') : '$11.000' }}
            </h4>

            <div class="mt-auto">
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">Agregar <i class="bi bi-cart"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100 position-relative">

          @auth
          @if(auth()->user()->role === 'admin' && $milaPollo)
          <form action="{{ route('productos.destroy', $milaPollo->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" onsubmit="return confirm('¿Seguro querés eliminar este producto?');">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow">
              <i class="bi bi-trash"></i>
            </button>
          </form>
          @endif
          @endauth

          <img src="{{ asset($milaPollo && $milaPollo->url_imagen ? $milaPollo->url_imagen : 'Img/milanesa de pollo 2.jpg') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Milanesa de pollo">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">{{ $milaPollo ? $milaPollo->nombre : 'Milanesa de Pollo (1 kg)' }}</h5>
            <p class="card-text text-light flex-grow-1">{{ $milaPollo && $milaPollo->descripcion ? $milaPollo->descripcion : 'Milanesa de pollo lista para freir, fresca y hecha en el día.' }}</p>

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mb-3">
              @if($milaPollo)
              @if($milaPollo->stock == 0)
              <span class="badge bg-danger p-2">Sin Stock</span>
              @elif($milaPollo->stock <= $milaPollo->stock_minimo)
                <span class="badge bg-warning text-dark p-2">¡Últimos en stock! (Quedan: {{ $milaPollo->stock }})</span>
                @else
                <span class="badge bg-success p-2">Disponible (Stock: {{ $milaPollo->stock }})</span>
                @endif
                @else
                <span class="badge bg-secondary p-2"><i class="bi bi-exclamation-triangle me-1"></i> Stock no inicializado</span>
                @endif
            </div>
            @endif
            @endauth

            <h4 class="fw-bold mb-3">
              {{ $milaPollo ? '$' . number_format($milaPollo->precio, 0, ',', '.') : '$11.000' }}
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
          <h5 class="modal-title fw-bold text-warning" id="modalLabel">Añadir Nueva Milanesa al Menú</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('productos.storeMilanesa') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label text-warning small fw-bold">Nombre del Producto</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="nombre" name="nombre" placeholder="Ej: Milanesa de Carne" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label text-warning small fw-bold">Descripción Corta</label>
              <textarea class="form-control bg-secondary text-white border-0" id="descripcion" name="descripcion" rows="2" placeholder="Frescas y hechas en el día..."></textarea>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label text-warning small fw-bold">Precio de Venta ($)</label>
              <input type="number" class="form-control bg-secondary text-white border-0" id="precio" name="precio" placeholder="11000" required>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label for="stock" class="form-label text-warning small fw-bold">Stock Disponible</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock" name="stock" placeholder="20" required>
              </div>
              <div class="col-6 mb-3">
                <label for="stock_minimo" class="form-label text-warning small fw-bold">Límite Stock Bajo</label>
                <input type="number" class="form-control bg-secondary text-white border-0" id="stock_minimo" name="stock_minimo" value="10" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="url_imagen" class="form-label text-warning small fw-bold">Ruta de Imagen (Opcional)</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="url_imagen" name="url_imagen" placeholder="Img/milanesa de carne sin freir.jpeg">
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning fw-bold text-dark">Guardar Milanesa</button>
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