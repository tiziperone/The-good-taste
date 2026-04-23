<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Bondiola</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
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
        <div class="card text-bg-dark border-warning shadow-sm">
          <img src="{{ asset('Img/BondiolaTarjetaSinPimenton.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Bondiola Clásica">

          <div class="card-body">
            <h5 class="card-title fw-bold text-warning">Bondiola Clásica (1kg)</h5>
            <p class="card-text text-light">Fiambre especial para compartir en picadas y comidas, acompañalo con lo que más te guste, o con quien más te guste 😉.</p>

            <h4 class="fw-bold mb-3">$30.000</h4>

            <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
              Agregar <i class="bi bi-cart"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm">
          <img src="{{ asset('Img/BondiolaTarjetaConPimenton.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Bondiola con Pimentón">

          <div class="card-body">
            <h5 class="card-title fw-bold text-warning">Bondiola al Pimentón (1kg)</h5>
            <p class="card-text text-light">Para aquellos que aman el pimentón, ésta es su elección ideal. El mismo y exquisito fiambre, pero con un toque especial 👌.</p>

            <h4 class="fw-bold mb-3">$30.000</h4>

            <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
              Agregar <i class="bi bi-cart"></i>
            </a>
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