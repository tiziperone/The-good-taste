<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Home</title>

    <!-- 1. Optimización de Fuentes Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

    <!-- 2. CSS Crítico -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- 3. Precarga de Imagen Principal -->
    <link rel="preload" as="image" href="{{ asset('Img/PastasHome.png') }}" fetchpriority="high">

    <!-- 4. Scripts con Defer (No bloquean el renderizado) -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- 5. Precarga inteligente de rutas (Simula velocidad SPA) -->
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>

    <style>
        .hover-warning:hover {
            color: #ffc107 !important;
            transition: color 0.3s ease;
        }

        .tarjeta-completa {
            background-color: #2b3035;
            border: 1px solid rgba(255, 193, 7, 0.3);
            color: white;
            transition: all 0.3s ease;
        }

        .tarjeta-completa:hover {
            background-color: #343a40;
            border-color: rgba(255, 193, 7, 1);
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.5);
            transform: scale(1.05);
        }

        .carousel-item {
            overflow: hidden;
        }

        .carousel-img-custom {
            width: 100% !important;
            height: 175px !important;
            object-fit: cover !important;
            object-position: left top !important;
        }

        @media (min-width: 768px) {
            .carousel-item {
                max-height: 530px;
            }

            .carousel-img-custom {
                height: 580px !important;
                object-fit: cover !important;
                object-position: center 50% !important;
            }
        }
    </style>
</head>

<body class="bg-dark">

    @include('componentes.navbar')

    <hr class="border-warning border-2 opacity-100 mt-0 mb-0">

    <div id="carouselExampleIndicators" class="carousel slide border-bottom border-warning border-2" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('Img/PastasHome.webp') }}" class="d-block w-100 carousel-img-custom" alt="Pastas" fetchpriority="high">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('Img/BondiolaHomeProximamente.webp') }}" class="d-block w-100 carousel-img-custom" alt="Bondiola" loading="lazy">
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

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="p-5 rounded-4 border border-warning border-opacity-25 shadow text-center" style="background-color: rgba(255, 255, 255, 0.03);">
                    <h2 class="estilo-marca-2 display-6 fw-bold text-white mb-3">
                        Bondiola y pastas caseras.
                    </h2>
                    <p class="fs-4 text-light mb-4">Cocinamos con los ingredientes perfectos para que disfrutes comida de calidad, todos los días.</p>

                    <a href="{{ url('/catalogo') }}" class="btn btn-warning btn-lg px-5 py-3 shadow fw-bold fs-4 text-dark">
                        <i class="bi bi-cart2 me-2"></i> ¡Mira nuestras delicias!
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center text-center g-4">
            <div class="col-12 col-md-8">
                <a href="{{ url('/comercializacion') }}" class="text-decoration-none">
                    <div class="card tarjeta-completa shadow-sm h-100 py-4 px-3">
                        <i class="bi bi-truck display-3 text-warning mb-2"></i>
                        <h4 class="fw-bold">¿Cómo enviamos?</h4>
                        <p class="text-light mb-0">Información sobre pedidos: entrega, envíos, pagos y como comprar nuestra comida casera.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')


</body>

</html>