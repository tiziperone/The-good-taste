<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Home</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .estilo-marca {
      font-family: 'Montserrat', sans-serif !important;
      font-weight: 900 !important;
      font-size: 1.5rem !important;
      letter-spacing: 1px;
      text-transform: uppercase;
      vertical-align: middle;
      color: #ffffff !important;
    }

    .estilo-marca-2 {
      font-family: 'Montserrat', sans-serif !important;
      font-weight: 1000 !important;
      font-size: 1.5rem !important;
      letter-spacing: 1px;
      text-transform: uppercase;
      vertical-align: middle;
      color: #000000 !important;
    }

    .navbar-personalizada {
      background-color: #1a1d20 !important;
      border-bottom: 2px solid #333;
    }

    .navbar-personalizada .nav-link {
      color: white !important;
    }

    .navbar-toggler {
      border: none !important;
      outline: none !important;
      box-shadow: none !important;
    }

    .navbar-toggler-icon {
      filter: invert(1);
    }

    #btnArriba {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background-color: #1a1d20;
      color: white;
      border: none;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      display: none;
      z-index: 999;
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

  <!--Carrusel con imagenes ilustrativas de los productos-->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500"> <!--data-bs-ride="carousel" hace que el carrusel cambie de imagenes data-bs-interval="3000" hace que el carrusel cambie de imagen cada 3 segundos-->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="max-height: 530px">
        <!--Imagen de bondiola-->
        <img src="{{ url('/Img/subir_calidad_4k_202604082227.png')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 50%;" alt="...">
      </div>
      <div class="carousel-item" style="max-height: 530px">
        <!--Imagen de milanesas-->
        <img src="{{ url('/Img/MilanesaHome.jpg')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 60%;" alt="...">
      </div>
      <div class="carousel-item" style="max-height: 530px">
        <!--Imagen de pastas-->
        <img src="{{ url('/Img/PastaHome.png')}}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 50%;" alt="...">
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

  <div class="container-fluid px-0 mt-5">
    <div class="row">
      <div class="col-12 bg-white mt-3 mb-5">
        <h2 class="estilo-marca-2 text-center fs-3">Bondiola, milanesas y pastas caseras hechas todos los días.</h2>
        <h3 class="text-center fs-3"> Cocinamos todos los días con ingredientes reales para que disfrutes comida de verdad.</h3>
      </div>
    </div>
  </div>

  <div class="container-fluid px-0 mt-5 bg-black">
    <div class="row g-0">
      <div class="col-12 text-white p-3">
        <h2 class="text-center m-0 fs-3 p-3">Encuéntranos</h2>
      </div>
      <div class="col-5 text-white p-3">
        <h2 class="text-center fs-5 p-3">Corrientes, Argentina. CP 3400.</h2>
      </div>
      <div class="col-2 text-white p-3">
        <h2 class="text-center fs-3 p-2">|</h2>
      </div>
      <div class="col-5 text-white p-3">
        <h2 class="text-center fs-5 p-3"> Calle 9 de Julio 1234.</h2>
      </div>
    </div>
    <!--
    <div class="row g-0">
      <div class="col-12 text-white p-3">
        <h2 class="text-center m-0 fs-3 p-3">Visita nuestras redes</h2>
      </div>
      <div class="col-5 text-white p-3">
        <h2 class="text-center fs-5 p-3">Instagram: @thegoodtaste</h2>
      </div>
      <div class="col-2 text-white p-3">
        <h2 class="text-center fs-3 p-2">|</h2>
      </div>
      <div class="col-5 text-white p-3">
        <h2 class="text-center fs-5 p-3">Facebook: @thegoodtaste</h2>
      </div>
    </div>
    <div class="row g-0">
      <div class="col-12 d-flex justify-content-center pt-5 pb-5">
        <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark img" width="300" height="300" alt="logo" style="object-fit: contain;">
      </div>
    </div>
  </div> -->

    <div class="text-center text-white py-4">

      <h2 class="fw-bold mb-2">Seguinos en nuestras Redes Sociales</h2>

      <div class="d-flex justify-content-center gap-4 mb-2"></div>

      <a href="https://instagram.com/elevate.dis" target="_blank" class="text-white fs-1">
        <i class="bi bi-instagram"></i>
      </a>
      <a
        href="https://facebook.com/adrian.obregon.3701/" target="_blank" class="text-white fs-1">
        <i class="bi bi-facebook"></i>
      </a>

    </div>

    <div class="row g-0">
      <div class="col-12 d-flex justify-content-center pt-5 pb-5">
        <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark img" width="300" height="300" alt="logo" style="object-fit: contain;">
      </div>
    </div>

  </div>

  <button id="btnArriba" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script>
    window.addEventListener('scroll', () => {
      const btn = document.getElementById('btnArriba');
      btn.style.display = window.scrollY > 300 ? 'block' : 'none';
    });
  </script>
  
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>