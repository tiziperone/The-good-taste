<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
  <title>The Good Taste - Nosotros</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

  <style>
    .card-hover {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-10px);
      /* se levanta */
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
      /* sombra */
    }
  </style>
</head>

<body>

  @include('componentes.navbar')


  <div class="container-fluid bg-dark text-white py-4 position-relative">
    <div class="container">
      <div class="d-flex gap-2 mb-4">
        <button onclick="history.back()" class="btn-navegacion" title="Volver atrás">
          <i class="bi bi-arrow-left"></i>
        </button>
        <button onclick="history.forward()" class="btn-navegacion" title="Ir adelante">
          <i class="bi bi-arrow-right"></i>
        </button>
      </div>
    </div>

    <div class="container-fluid bg-dark text-white py-5">

      <h1 class="text-center card-title mb-5">¿Quiénes Somos?</h1>

      <div class="row justify-content-center mb-5 px-3">
        <div class="col-12 col-md-10 col-lg-8">

          <p class="lead text-center mb-5" style="font-family: 'Montserrat', sans-serif;">
            En The Good Taste, fusionamos nuestra dedicación como estudiantes universitarios con la elaboración de comida casera. Lo que comenzó como un proyecto productivo escolar y como un emprendimiento familiar, hoy es nuestra forma de llevar sabores auténticos y caseros a tu mesa.
          </p>

          <div class="row mt-4">
            <div class="col-md-6 mb-4 mb-md-0 px-md-4 text-start border-md-end border-warning">
              <h3 class="h5 text-warning fw-bold mb-3">
                <i class="bi bi-clock-history me-2"></i>Nuestra Historia
              </h3>
              <p style="text-align: justify;">
                Nuestra trayectoria comenzó antes de estudiar la carrera de Licenciatura en Sistemas, realizando comida artesanal. Luego, fuimos perfeccionando nuestras recetas de bondiolas, pastas y milanesas hasta darle vida a este proyecto con el impulso de un proyecto facultativo.
              </p>
            </div>

            <div class="col-md-6 px-md-4 text-start">
              <h3 class="h5 text-warning fw-bold mb-3">
                <i class="bi bi-bullseye me-2"></i>Nuestros Objetivos
              </h3>
              <p style="text-align: justify;">
                Buscamos ofrecer <em>"comida de verdad"</em>, elaborada con el mismo cuidado y calidad con el que desarrollamos nuestros proyectos. Nuestro objetivo es seguir creciendo como marca, mantener siempre la frescura de nuestros ingredientes y asegurarnos de que cada bocado te haga sentir como en casa.
              </p>
            </div>
          </div>

          <hr class="border-warning mt-5 mb-2" style="opacity: 0.3;">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card card-hover ms-md-5 mt-5 p-2 text-dark" style="width: 20rem;">
            <img src="{{ asset('Img/tizianoperone.png') }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tiziano Perone</h5>
              <p class="card-text" style="text-align: justify;">Tengo 20 años, soy estudiante de Lic. en Sistemas, oriundo de Florencia, Santa Fe. Me especializo en elaboración artesanal de embutidos (bondiola).</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card card-hover ms-md-5 mt-5 p-2 text-dark" style="width: 20rem;">
            <img src="{{ asset('Img/adrianobregon.png') }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="...">
            <div class="card-body">
              <h5 class="card-title">Adrián Obregón</h5>
              <p class="card-text" style="text-align: justify;">Tengo 22 años, soy estudiante de Lic. en Sistemas, vivo en San Luis del Palmar, Corrientes. Me especializo en hacer las milanesas de carne.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('componentes.footer')

  </div>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>