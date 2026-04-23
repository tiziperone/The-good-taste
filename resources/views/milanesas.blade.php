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

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/milanesa sola ejemplo.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Milanesa de Carne 1kg sin Freir. (un kilogramo).</h5>
            <p class="card-text" style="text-align: justify;">Milanesa lista para freir, acompañalo con lo que mas te guste, o con quien mas te guste 😉.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a> $10.000
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/milanesaconguarnicion.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">1 Milanesa de Carne Frita con Guarnicion. (una Unidad).</h5>
            <p class="card-text" style="text-align: justify;">Milanesa de carne frita con guarnicion, puede ser: con ensalada de lechuga y tomate, puré o ensalada rusa.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a> $8000
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