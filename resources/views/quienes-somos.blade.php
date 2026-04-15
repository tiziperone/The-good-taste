<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Nosotros</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

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

    <!--Estilo de Fuente Montserrat black para el titulo de quienes somos-->
  <style>
    .titulo {
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 900; /* black */
    }
    </style>

    <!--Pequeña animacion para las tarjetas de quienes somos-->
    <style>
        .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
        transform: translateY(-10px); /* se levanta */
        box-shadow: 0 10px 25px rgba(0,0,0,0.5); /* sombra */
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

<!--Contenedor de las tarjetas de quienes somos centrados-->
    <div class="container-fluid bg-dark text-white py-5">
        <!-- Título -->
        <h1 class="text-center titulo">¿Quiénes Somos?</h1>
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
      <div class="card card-hover ms-5 mt-5 p-2" style="width: 20rem;">
        <img src="{{ asset('Img/tizianoperone.png') }}" class="card-img-top" style="height: 400px;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Tiziano Perone</h5>
          <p class="card-text" style="text-align: justify;">Tengo 20 años, Estudiante de Lic. en Sistemas, Oriundo de Santa Fe, Florencia. Me especializo en hacer Bondiola casera.</p>
          <p class="card-text" style="text-align: justify;">Tengo 20 años, soy estudiante de Lic. en Sistemas, oriundo Florencia, Santa Fe. Me especializo en elaboracion artesanal de embutidos (bondiola).</p>
        </div>
      </div>
      </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card card-hover ms-5 mt-5 p-2" style="width: 20rem;">
            <img src="{{ asset('Img/adrianobregon.png') }}" class="card-img-top" style="height: 400px;" alt="...">
            <div class="card-body">
              <h5 class="card-title">Adrián Obregón</h5>
              <p class="card-text" style="text-align: justify;">Tengo 22 años, Soy Estudiante de Lic. en Sistemas , Vivo en Corrientes, San luis del Palmar. Me especializo en hacer las Milanesas de carne.</p>
            </div>
          </div>
        </div>
  </div>
</div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>