<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Catálogo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <style>
        .col-12 {
            overflow: visible !important;
            position: relative;
        }

        .col-12 img {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
            z-index: 1;

            width: 100%;
            height: auto;
            max-height: 65vh;
            object-fit: cover;

            object-position: 5% center;
        }

        .col-12:hover img {
            transform: scale(1.02);
            z-index: 10;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        @media (min-width: 1200px) {
            .col-12 img {
                max-height: 75vh;
            }
        }

        @media (max-width: 768px) {
            .col-12 img {
                max-height: none !important;
                height: auto !important;
                object-position: center center;
            }
        }
    </style>
</head>

<body class="bg-dark">

    @include('componentes.navbar')

    <div class="container mt-4 mb-2">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <div class="container-fluid bg-dark text-white text-center py-1 border-bottom border-warning">
        <h1 class="fw-bold fs-2 mb-2 card-title">Nuestro Menú</h1>
        <p class="fs-5 text-warning mb-5">Haz clic en la imagen de lo que quieras comer hoy</p>
    </div>

    <div class="row g-0 mt-5">

        @if($tieneBondiolas)
        <div class="col-12 text-center">
            <a href="{{ url('/bondiola') }}" class="text-decoration-none">
                <img src="{{ asset('Img/FotoBondiolaCatalogo.jpg') }}" class="w-100 d-block" alt="Foto de Bondiola">
            </a>
        </div>
        @endif

        @if($tieneMilanesas)
        <div class="col-12 text-center">
            <a href="{{ url('/milanesas') }}" class="text-decoration-none">
                <img src="{{ asset('Img/FotoMilanesaCatalogo.jpg') }}" class="w-100 d-block" alt="Foto de Milanesa">
            </a>
        </div>
        @endif

        @if($tienePastas)
        <div class="col-12 text-center">
            <a href="{{ url('/pastas') }}" class="text-decoration-none">
                <img src="{{ asset('Img/SaborAHogar.jpg') }}" class="w-100 d-block" alt="Foto de Pastas">
            </a>
        </div>
        @endif

        @if(!$tieneBondiolas && !$tieneMilanesas && !$tienePastas)
        <div class="col-12 text-center text-light my-5 py-5">
            <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary"></i>
            <p class="fs-4">Por el momento no tenemos productos disponibles en el menú. ¡Vuelve pronto!</p>
        </div>
        @endif

    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>