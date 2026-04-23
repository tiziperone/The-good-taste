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

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/BondiolaTarjetaSinPimenton.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Bondiola 1kg. (un kilogramo).</h5>
            <p class="card-text" style="text-align: justify;">Fiambre especial para compartir en picadas y comidas, acompañalo con lo que mas te guste, o con quien mas te guste 😉.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a>
            <span class="ms-2">$30.000</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/BondiolaTarjetaConPimenton.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Bondiola 1kg. (un kilogramo).</h5>
            <p class="card-text" style="text-align: justify;">Para aquellos que aman el pimentón, ésta es su elección ideal. El mismo y exquisito fiambre, pero con un toque especial 👌.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Comprar</a>
            <a href="{{ url('/carrito') }}" class="btn btn-primary ms-2">Agregar
              <i class="bi bi-cart"></i>
            </a>
            <span class="ms-2">$30.000</span>
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