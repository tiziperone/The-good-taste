<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Nosotros</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

  <style>
    /* Efecto para que se "levanten" las tarjetas con nuestras fotos*/
    .card-hover {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
    }

    .card-hover:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    /* Estilo para el título */
    .titulo-nosotros {
      font-family: 'Montserrat', sans-serif;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 3px;
      position: relative;
      display: inline-block;
      padding-bottom: 15px;
      color: #fff;
    }

    .titulo-nosotros::after {
      content: "";
      position: absolute;
      width: 60%;
      height: 4px;
      background-color: #ffc107;
      /* Color warning */
      bottom: 0;
      left: 20%;
      border-radius: 2px;
    }

    .subtitulo-esencia {
      display: block;
      color: #ffc107;
      font-size: 0.85rem;
      letter-spacing: 5px;
      text-transform: uppercase;
      margin-bottom: 5px;
    }
  </style>
</head>

<body class="bg-dark">

  @include('componentes.navbar')

  <div class="container mt-4 mb-4">
    @include('componentes.botonesAtrasAdelante')
  </div>

  <hr class="border-warning border-2 opacity-100">

  <div class="container py-5">

    <div class="text-center mb-4">
      <span class="subtitulo-esencia">Nuestra Esencia</span><!-- Aqui y en la linea de abajo se aplican estilos predefinidos en el <style> de arriba-->
      <h1 class="titulo-nosotros">¿Quiénes Somos?</h1>
    </div>

    <div class="row justify-content-center px-3">
      <div class="col-12 col-md-10 col-lg-8">

        <div class="row mt-0">

          <div class="col-md-6 mb-4 mb-md-0 px-md-4 text-start border-md-end border-warning">
            <h3 class="h5 text-warning fw-bold mb-3">
              <i class="bi bi-clock-history me-2"></i>Nuestra Historia
            </h3>
            <p class="text-secondary" style="text-align: justify; color: #ccc !important;">
              Nuestra trayectoria comenzó en nuestra adolescencia, realizando comida artesanal como un microemprendimiento. Luego, fuimos perfeccionando nuestras recetas de bondiolas, pastas y milanesas hasta darle vida a este proyecto con el impulso de un trabajo facultativo.
            </p>
          </div>

          <div class="col-md-6 px-md-4 text-start">
            <h3 class="h5 text-warning fw-bold mb-3">
              <i class="bi bi-bullseye me-2"></i>Nuestros Objetivos
            </h3>
            <p class="text-secondary" style="text-align: justify; color: #ccc !important;">
              Buscamos ofrecer <em>"comida de verdad"</em>, elaborada con el mismo cuidado y calidad con el que desarrollamos nuestros proyectos. Nuestro objetivo es seguir creciendo como marca, mantener siempre la frescura de nuestros ingredientes y asegurarnos de que cada plato te haga sentir como en casa.
            </p>
          </div>

        </div>

        <hr class="border-warning mt-5 mb-4" style="opacity: 0.3;">

      </div>
    </div>

    <div class="row justify-content-center g-4">
      <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <div class="card card-hover p-2 text-dark" style="width: 20rem;">
          <img src="{{ asset('Img/tizianoperone.png') }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="Tiziano Perone">
          <div class="card-body">
            <h5 class="card-title fw-bold">Tiziano Perone</h5>
            <p class="card-text text-muted" style="text-align: justify;">Tengo 20 años, soy de Florencia Sta. Fe, actual estudiante de Lic. en Sistemas en la ciudad de Corrientes. Me especializo en la elaboración artesanal de embutidos (bondiola).</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <div class="card card-hover p-2 text-dark" style="width: 20rem;">
          <img src="{{ asset('Img/adrianobregon.png') }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="Adrián Obregón">
          <div class="card-body">
            <h5 class="card-title fw-bold">Adrián Obregón</h5>
            <p class="card-text text-muted" style="text-align: justify;">Tengo 22 años, soy estudiante de Lic. en Sistemas, vivo en San Luis del Palmar, Corrientes. Me especializo en hacer las milanesas de carne.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('componentes.botonHaciaArriba')
  @include('componentes.footer')
  </div>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>