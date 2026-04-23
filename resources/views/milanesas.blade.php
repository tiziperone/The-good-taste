<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Milanesas</title>

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
    <div class="row justify-content-center gap-4">

      <div class="col-12 col-md-5 col-lg-4">
        <div class="card text-bg-dark border-warning shadow-sm h-100">
          <img src="{{ asset('Img/milanesa sola ejemplo.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Milanesa para freír">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Milanesa de Carne sin Freír (1kg.)</h5>
            <p class="card-text text-light">Milanesa lista para freír, acompañala con lo que más te guste, o con quien más te guste 😉.</p>

            <div class="mt-auto">
              <h4 class="fw-bold mb-3">$10.000</h4>
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
          <img src="{{ asset('Img/milanesaconguarnicion.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Milanesa con guarnición">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-warning">Milanesa Frita con Guarnición (1 una)</h5>
            <p class="card-text text-light">Milanesa de carne frita con guarnición, puede ser: ensalada de lechuga y tomate, puré o ensalada rusa.</p>

            <div class="mt-auto">
              <h4 class="fw-bold mb-3">$8.000</h4>
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