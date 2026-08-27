<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Catálogo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <style>
        .catalogo-banner-link {
            display: block;
            width: 100%;
            text-decoration: none;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .catalogo-banner-link:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 35px rgba(255, 193, 7, 0.2);
        }

        /* Formato estándar de banner para todas las opciones del catálogo */
        .banner-menu-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        /* Banner de pastas: mantiene el mismo tamaño de banner pero muestra el logo centrado completo */
        .banner-pastas-wrapper {
            width: 100%;
            height: 180px;
            background-color: #f7f3ec;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-pastas-img {
            height: 100%;
            width: auto;
            max-width: 100%;
            object-fit: contain;
        }

        /* Ajustes para pantalla de computadora (PC) */
        @media (min-width: 768px) {

            .banner-menu-img,
            .banner-pastas-wrapper {
                height: 320px;
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
        <p class="fs-5 text-warning mb-4">Haz clic en la imagen de lo que quieras comer hoy</p>
    </div>

    <div class="container py-4">
        <div class="row justify-content-center g-4">

            @if($tieneBondiolas)
            <div class="col-12 col-lg-10">
                <a href="{{ url('/bondiola') }}" class="catalogo-banner-link">
                    <img src="{{ asset('Img/FotoBondiolaCatalogo.jpg') }}" class="banner-menu-img" alt="Foto de Bondiola">
                </a>
            </div>
            @endif

            @if($tieneMilanesas)
            <div class="col-12 col-lg-10">
                <a href="{{ url('/milanesas') }}" class="catalogo-banner-link">
                    <img src="{{ asset('Img/FotoMilanesaCatalogo.jpg') }}" class="banner-menu-img" alt="Foto de Milanesa">
                </a>
            </div>
            @endif

            @if($tienePastas)
            <div class="col-12 col-lg-10">
                <a href="{{ url('/pastas') }}" class="catalogo-banner-link">
                    <div class="banner-pastas-wrapper">
                        <img src="{{ asset('Img/SaborAHogar.jpg') }}" class="banner-pastas-img" alt="Foto de Pastas">
                    </div>
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
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>