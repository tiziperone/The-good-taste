<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Home</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <style>
    .estilo-marca { /* Clase personalizada para el estilo de la marca en la barra de navegación */
      font-family: 'Pacifico', cursive !important; /* Usamos la fuente "Pacifico" */
      font-size: 1.4rem !important; /* Definimos el tamaño de la fuente >n° => mas grande */
      letter-spacing: 0.8px; /* Espacio entre cada letra  >n° => mas espacio*/
    }
  </style>
</head>
<body>



<!--Barra de navegacion-->
<nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="{{ url('/pagina-principal') }}">
    <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="50" height="50" alt="logo">
    The good taste</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active mx-2" aria-current="page" href="{{ url('/pagina-principal') }}">Inicio</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/bondiola') }}">Bondiola</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/milanesas') }}">Milanesas</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/pastas') }}">Pastas</a>
      </div>
    </div>
  </div>
</nav>

<!--Carrusel con imagenes ilustrativas de los productos-->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="max-height: 580px">
        <!--Imagen de bondiola-->
      <img src="{{ url('/Img/subir_calidad_4k_202604082227.png')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 30%;" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 580px">
        <!--Imagen de milanesas-->
      <img src="{{ url('/Img/MILANESA.jpg')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center;" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 580px">
        <!--Imagen de pastas-->
      <img src="{{ url('/Img/imagen_de_pastas_202604082218.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Boton para ir al apartado de contacto creado anteriormente -->
<a href="{{ url('/contacto') }}" class="btn btn-primary mt-4 m-4 p-2">
  <h2 class="text-center fs-5">Contáctanos</h2>
</a>

<div class="container-fluid px-0 mt-5">
  <div class="row g-0">
    <div class="col-12 bg-dark text-white p-3">
      <h2 class="text-center m-0 fs-3 p-3">Acerca de nosotros</h2>
    </div>
    <div class="col-5 bg-dark text-white p-3">
      <h2 class="text-center fs-5 p-3">Corrientes, Argentina. CP 3400.</h2>
    </div>
    <div class="col-2 bg-dark text-white p-3">
      <h2 class="text-center fs-3 p-2">|</h2>
    </div>
    <div class="col-5 bg-dark text-white p-3">
      <h2 class="text-center fs-5 p-3">Teléfono: +54 3794 123456</h2>
    </div>
  </div>
</div>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>