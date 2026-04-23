<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Pastas</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts-->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>

<body class="bg-dark">

  @include('componentes.navbar')

  <div class="container mt-4 mb-4">
    @include('componentes.botonesAtrasAdelante')
  </div>

  <hr class="border-warning border-2 opacity-100">


  <div class="container mt-5 mb-5">
    <div class="row justify-content-center g-4">

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100">
          <img src="{{ asset('Img/RaviolesTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Ravioles">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Ravioles (1 docena)</h5>
            <p class="card-text text-light">Deliciosos ravioles rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>

            <div class="mt-auto">
              <h4 class="fw-bold mb-3">$3.800</h4>
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
                Agregar <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100">
          <img src="{{ asset('Img/SorrentinosTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Sorrentinos">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Sorrentinos (1 docena)</h5>
            <p class="card-text text-light">Deliciosos sorrentinos rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>

            <div class="mt-auto">
              <h4 class="fw-bold mb-3">$4.000</h4>
              <a href="{{ url('/compra') }}" class="btn btn-warning fw-bold text-dark">Comprar</a>
              <a href="{{ url('/carrito') }}" class="btn btn-outline-light ms-2">
                Agregar <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100">
          <img src="{{ asset('Img/FideosTarjeta.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Fideos">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Fideos (500g)</h5>
            <p class="card-text text-light">Fideos de alta calidad, ideales para preparar platos sabrosos con una exquisita salsa.</p>

            <div class="mt-auto">
              <h4 class="fw-bold mb-3">$2.500</h4>
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

  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>