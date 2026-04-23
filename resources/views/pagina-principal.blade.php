<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Home</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* Pequeño detalle para que las redes brillen en amarillo al pasar el mouse */
        .hover-warning:hover {
            color: #ffc107 !important;
            transition: color 0.3s ease;
        }

        /* ELIMINAMOS los estilos de #btnArriba de aquí porque el componente ya tiene los suyos */
    </style>
</head>

<body class="bg-dark">

    @include('componentes.navbar')

    <div id="carouselExampleIndicators" class="carousel slide border-bottom border-warning border-3" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="max-height: 530px">
                <img src="{{ url('/Img/subir_calidad_4k_202604082227.png') }}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 50%;" alt="Imagen 1">
            </div>
            <div class="carousel-item" style="max-height: 530px">
                <img src="{{ url('/Img/MilanesaHome.jpg') }}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 60%;" alt="Milanesas">
            </div>
            <div class="carousel-item" style="max-height: 530px">
                <img src="{{ url('/Img/PastaHome.png') }}" class="d-block w-100" style="height: 580px; object-fit: cover; object-position: center 50%;" alt="Pastas">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <div class="container-fluid px-0 mt-5 mb-5 text-center">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 bg-dark mt-3">
                <h2 class="estilo-marca-2 fs-2 fw-bold text-white mb-3 card-title">Bondiola, milanesas y pastas caseras todos los días.</h2>
                <p class="fs-4 text-white">Cocinamos con ingredientes reales para que disfrutes comida de verdad.</p>

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
                <a href="https://wa.me/5493794000000" target="_blank" class="text-white text-decoration-none mt-2">
                    <div class="card shadow-sm h-100 py-4 card-hover">
                        <i class="bi bi-journal-text display-3 text-success mb-2"></i>
                        <h4 class="fw-bold">¡Celebra tu cumpleaños!</h4>
                        <p class="text-muted">Si quieres celebrar tu cumpleaños con un menú especial y único, contáctanos y coordinamos.</p>
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

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>