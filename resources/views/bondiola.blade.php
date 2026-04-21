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

<body>

  <!--Barra de navegacion-->
  <nav class="navbar navbar-expand-sm navbar-personalizada">
    <div class="container-fluid">
      <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="{{ url('/pagina-principal') }}">
        <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
        <span class="estilo-marca">The good taste</span></a> <!--<span>, te aseguras de que el estilo de fuente solo toque a las letras y no afecte a otros elementos que metas en el <a>-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active mx-2" aria-current="page" href="{{ url('/pagina-principal') }}">
            <h2 class="text-lg pt-1 fs-6">Inicio</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/catalogo') }}">
            <h2 class="text-lg pt-1 fs-6">Catálogo</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/comercializacion') }}">
            <h2 class="text-lg pt-1 fs-6">Comercialización</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/contacto') }}">
            <h2 class="text-lg pt-1 fs-6">Contáctanos</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/quienes-somos') }}">
            <h2 class="text-lg pt-1 fs-6">¿Quiénes somos?</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/terminos-y-usos') }}">
            <h2 class="text-lg pt-1 fs-6">Términos y Usos</h2>
          </a>
        </div>
      </div>
    </div>
  </nav>

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
</body>

</html>