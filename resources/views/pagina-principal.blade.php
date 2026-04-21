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

<div class="container-fluid px-0 mt-5 mb-5 text-center">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 bg-white mt-3">
            <h2 class="estilo-marca-2 fs-2 fw-bold text-dark mb-3">Bondiola, milanesas y pastas caseras todos los días.</h2>
            <p class="fs-4 text-muted">Cocinamos con ingredientes reales para que disfrutes comida de verdad.</p>
            
            <a href="{{ url('/catalogo') }}" class="btn btn-warning btn-lg px-5 py-3 mt-3 shadow-sm rounded-pill fw-bold fs-4 text-dark">
                <i class="bi bi-cart2 me-2"></i> ¡Mira nuestras delicias!
            </a>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row text-center g-4">
        <div class="col-12 col-md-4">
            <a href="{{ url('/comercializacion') }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100 py-4 card-hover">
                    <i class="bi bi-truck display-3 text-warning mb-2"></i>
                    <h4 class="fw-bold">¿Cómo enviamos?</h4>
                    <p class="text-muted">Conoce nuestras zonas y horarios.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ url('/contacto') }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100 py-4 card-hover">
                    <i class="bi bi-whatsapp display-3 text-success mb-2"></i>
                    <h4 class="fw-bold">Haz tu pedido</h4>
                    <p class="text-muted">Si quieres celebrar tu cumpleaños con un menú especial y único, contáctanos y coordinamos todo.</p>
                </div>
            </a>
        </div> 
        <div class="col-12 col-md-4">
            <a href="{{ url('/quienes-somos') }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100 py-4 card-hover">
                    <i class="bi bi-shop display-3 text-danger mb-2"></i>
                    <h4 class="fw-bold">Nosotros</h4>
                    <p class="text-muted">Conoce a los cocineros.</p>
                </div>
            </a>
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

<div class="d-flex justify-content-center gap-4 mb-4">
    <a href="https://instagram.com/elevate.dis" target="_blank" class="text-white text-decoration-none transition-hover">
        <i class="bi bi-instagram display-4"></i>
        <p class="mt-2">Instagram</p> </a>
    <a href="https://facebook.com/adrian.obregon.3701/" target="_blank" class="text-white text-decoration-none transition-hover">
        <i class="bi bi-facebook display-4"></i>
        <p class="mt-2">Facebook</p>
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