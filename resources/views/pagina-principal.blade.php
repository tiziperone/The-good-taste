<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Home</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->

  <style>
    .estilo-marca { /* Clase personalizada para el estilo de la marca en la barra de navegación */
    font-family: 'Montserrat', sans-serif !important;
    font-weight: 900 !important; 
    font-size: 1.5rem !important;
    letter-spacing: 1px;
    text-transform: uppercase; /* Para que combine con el logo*/
    vertical-align: middle;
  }
  </style>

  <style>
  .navbar-personalizada {
    background-color: #1a1d20 !important; /* Un gris muy oscuro casi negro */
    border-bottom: 2px solid #333; /* Opcional: una línea sutil abajo */
  }

  /* Para que los links no se pierdan en el fondo oscuro */
  .navbar-personalizada .nav-link {
    color: white !important; /*links sean blancos */
  }
  
  .estilo-marca {
    font-family: 'Montserrat', sans-serif !important; /* Aplicamos la fuente "Montserrat" */
    font-weight: 900 !important; /* Aplicamos negrita */
    font-size: 1.4rem !important; /* Aplicamos el tamaño de fuente */
    text-transform: uppercase; /* Aplicamos transformación a mayúsculas */
    color: #ffffff !important; /* Nombre blanco */
  }

  <style>
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
      <img src="{{ url('/Img/MilanesaHome.jpg')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 30%;" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 580px">
        <!--Imagen de pastas-->
      <img src="{{ url('/Img/PastaHome.png')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 30%;" alt="...">
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
<div class="container mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-auto">
      <div class="btn-group" role="group"><!--role group es un atributo que se utiliza para indicar que los elementos dentro de este contenedor forman parte de un grupo de botones, lo que permite aplicar estilos y comportamientos específicos a todo el grupo en conjunto.-->

        <a href="{{ url('/quienes-somos') }}" 
          class="btn bg-dark text-white border-secondary rounded-bottom-0 p-3" 
          style="border-bottom-0">
          <h2 class="fs-6 mb-0">¿Quiénes somos?</h2>
        </a>

        <a href="{{ url('/contacto') }}" 
          class="btn bg-dark text-white border-secondary rounded-bottom-0 p-3" 
          style="border-bottom-0">
          <h2 class="fs-6 mb-0">Contáctanos</h2>
        </a>

        <a href="{{ url('/quienes-somos') }}" 
          class="btn bg-dark text-white border-secondary rounded-bottom-0 p-3" 
          style="border-bottom-0">
          <h2 class="fs-6 mb-0">¿Donde estamos?</h2>
        </a>

      </div>
    </div>
  </div>
</div>

<div class="container-fluid px-0 mt-0">
  <div class="row g-0">
    <div class="col-12 bg-black text-white p-3">
      <h2 class="text-center m-0 fs-3 p-3">Acerca de nosotros</h2>
    </div>
    <div class="col-5 bg-black text-white p-3">
      <h2 class="text-center fs-5 p-3">Corrientes, Argentina. CP 3400.</h2>
    </div>
    <div class="col-2 bg-black text-white p-3">
      <h2 class="text-center fs-3 p-2">|</h2>
    </div>
    <div class="col-5 bg-black text-white p-3">
      <h2 class="text-center fs-5 p-3">Teléfono: +54 3794 123456</h2>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-12 bg-black text-white p-3">
      <h2 class="text-center m-0 fs-3 p-3">Redes sociales</h2>
    </div>
    <div class="col-5 bg-black text-white p-3">
      <h2 class="text-center fs-5 p-3">Instagram: @thegoodtaste</h2>
    </div>
    <div class="col-2 bg-black text-white p-3">
      <h2 class="text-center fs-3 p-2">|</h2>
    </div>
    <div class="col-5 bg-black text-white p-3">
      <h2 class="text-center fs-5 p-3">Facebook: @thegoodtaste</h2>
    </div>
  <div class="row g-0">
    <div class="col-12 bg-black d-flex justify-content-center pt-5 pb-5">
      <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark img" width="300" height="300" alt="logo" style="object-fit: contain;">
    </div>
  </div>
</div>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>