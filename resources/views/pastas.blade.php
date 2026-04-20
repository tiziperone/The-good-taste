<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Pastas</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <style>
    .estilo-marca {
      /* Clase personalizada para el estilo de la marca en la barra de navegación */
      font-family: 'Montserrat', sans-serif !important;
      font-weight: 900 !important;
      font-size: 1.5rem !important;
      letter-spacing: 1px;
      text-transform: uppercase;
      /* Para que combine con el logo*/
      vertical-align: middle;
    }
  </style>

  <style>
    .navbar-personalizada {
      background-color: #1a1d20 !important;
      /* Un gris muy oscuro casi negro */
      border-bottom: 2px solid #333;
      /* Opcional: una línea sutil abajo */
    }

    /* Para que los links no se pierdan en el fondo oscuro */
    .navbar-personalizada .nav-link {
      color: white !important;
      /*links sean blancos */
    }

    .estilo-marca {
      font-family: 'Montserrat', sans-serif !important;
      /* Aplicamos la fuente "Montserrat" */
      font-weight: 900 !important;
      /* Aplicamos negrita */
      font-size: 1.4rem !important;
      /* Aplicamos el tamaño de fuente */
      text-transform: uppercase;
      /* Aplicamos transformación a mayúsculas */
      color: #ffffff !important;
      /* Nombre blanco */
    }

    /* Quita el recuadro/borde del botón y la sombra al hacer clic */
    .navbar-toggler {
      border: none !important;
      outline: none !important;
      box-shadow: none !important;
    }

    /* Cambia el color del icono (las tres líneas) a blanco */
    /* Usamos invert(1) para convertir el SVG negro original en blanco */
    .navbar-toggler-icon {
      filter: invert(1);
    }
  </style>

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
            <h2 class="text-lg pt-1 fs-5">Inicio</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/bondiola') }}">
            <h2 class="text-lg pt-1 fs-5">Bondiola</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/milanesas') }}">
            <h2 class="text-lg pt-1 fs-5">Milanesas</h2>
          </a>
          <a class="nav-link mx-2 text-black" href="{{ url('/pastas') }}">
            <h2 class="text-lg pt-1 fs-5">Pastas</h2>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/RaviolesTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title"> Ravioles 1doc. (Una docena.).</h5>
            <p class="card-text" style="text-align: justify;">Deliciosos ravioles rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Agregar al carrito</a>
            <span class="ms-2">$3.800</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/SorrentinosTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Sorrentinos 1doc. (Una docena.).</h5>
            <p class="card-text" style="text-align: justify;">Deliciosos sorrentinos rellenos de jamón y queso o carne, ideales para compartir un domingo en familia.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Agregar al carrito</a>
            <span class="ms-2">$4.000</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card ms-5 mt-5 p-2" style="width: 20rem;">
          <img src="{{ asset('Img/FideosTarjeta.png') }}" class="card-img-top" style="height: 200px;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Fideos 500g. (Quinientos gramos.).</h5>
            <p class="card-text" style="text-align: justify;">Fideos de alta calidad, ideales para preparar platos sabrosos con una exquisita salsa.</p>
            <a href="{{ url('/compra') }}" class="btn btn-primary">Agregar al carrito</a>
            <span class="ms-2">$2.500</span>
          </div>
        </div>
      </div>



    </div>
  </div>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>