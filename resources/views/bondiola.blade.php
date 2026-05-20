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

  <div class="container mt-4 mb-4">
    @include('componentes.botonesAtrasAdelante')
  </div>

  <hr class="border-warning border-2 opacity-100">

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center gap-4">

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100">
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
                <span class="badge bg-secondary p-2">Stock no inicializado</span>
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
        <div class="card text-bg-dark border-warning shadow-sm h-100">
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
                <span class="badge bg-secondary p-2">Stock no inicializado</span>
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

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://unpkg.com/twemoji@latest/dist/twemoji.min.js" crossorigin="anonymous"></script>
  <script>
    twemoji.parse(document.body);
  </script>

  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')

</body>

</html>