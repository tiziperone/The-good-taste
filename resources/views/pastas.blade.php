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

<body>

  @include('componentes.navbar')

  <div style="position: relative;">
    <div style="position: absolute; top: 20px; left: 20px; z-index: 100;" class="d-flex gap-2">
      <button onclick="history.back()" class="btn-navegacion" title="Volver atrás">
        <i class="bi bi-arrow-left"></i>
      </button>

      <button onclick="history.forward()" class="btn-navegacion" title="Ir adelante">
        <i class="bi bi-arrow-right"></i>
      </button>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/RaviolesTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title"> Ravioles 1doc. (Una docena.).</h5>
            <p class="card-text" style="text-align: justify;">Deliciosos ravioles rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a> $3.800
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/SorrentinosTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Sorrentinos 1doc. (Una docena.).</h5>
            <p class="card-text" style="text-align: justify;">Deliciosos sorrentinos rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a> $4.000
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/FideosTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Fideos 500g. (Quinientos gramos.).</h5>
            <p class="card-text" style="text-align: justify;">Fideos de alta calidad, ideales para preparar platos sabrosos con una exquisita salsa.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a> $2.500
          </div>
        </div>
      </div>



    </div>
  </div>

  @include('componentes.footer')

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>