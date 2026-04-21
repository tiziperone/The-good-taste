<!DOCTYPE html>
<html lang="en">

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
        /* Estilos necesarios para efectos en las fotos del catálogo */
        /* El contenedor debe permitir que la imagen "salga" */
        .col-12 {
            overflow: visible !important;
            position: relative;
            /* Necesario para que el z-index funcione */
        }

        /* Estilo base de la imagen */
        .col-12 img {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
            z-index: 1;
            /* Todas empiezan en el mismo nivel */
        }

        /* Efecto cuando pasas el cursor (Hover) */
        .col-12:hover img {
            transform: scale(1.05);
            /* Lo baje un poquito a 1.05 para que no tape el footer */
            z-index: 10;
            /* Se pone por encima de todas las demás */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            /* Sombra para dar profundidad */
        }

        /* En celular la altura es automática para que no se deforme */
        @media (max-width: 768px) {
            .col-12 img {
                height: auto !important;
            }
        }
    </style>
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-sm navbar-personalizada bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="{{ url('/pagina-principal') }}">
                <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
                <span class="estilo-marca">The good taste</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active mx-2" aria-current="page" href="{{ url('/pagina-principal') }}">
                        <h2 class="text-lg pt-1 fs-6">Inicio</h2>
                    </a>
                    <a class="nav-link mx-2 text-white" href="{{ url('/catalogo') }}">
                        <h2 class="text-lg pt-1 fs-6">Catálogo</h2>
                    </a>
                    <a class="nav-link mx-2 text-white" href="{{ url('/comercializacion') }}">
                        <h2 class="text-lg pt-1 fs-6">Comercialización</h2>
                    </a>
                    <a class="nav-link mx-2 text-white" href="{{ url('/contacto') }}">
                        <h2 class="text-lg pt-1 fs-6">Contáctanos</h2>
                    </a>
                    <a class="nav-link mx-2 text-white" href="{{ url('/quienes-somos') }}">
                        <h2 class="text-lg pt-1 fs-6">¿Quiénes somos?</h2>
                    </a>
                    <a class="nav-link mx-2 text-white" href="{{ url('/terminos-y-usos') }}">
                        <h2 class="text-lg pt-1 fs-6">Términos y Usos</h2>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-2">
        <div class="d-flex gap-2">
            <button onclick="history.back()" class="btn-navegacion shadow" title="Volver atrás">
                <i class="bi bi-arrow-left"></i>
            </button>
            <button onclick="history.forward()" class="btn-navegacion shadow" title="Ir adelante">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>

    <div class="container-fluidbg-dark text-white text-center py-1 border-bottom border-warning">
        <h1 class="fw-bold fs-2 mb-2 card-title">Nuestro Menú</h1>
        <p class="fs-5 text-warning mb-5">Haz clic en la imagen de lo que quieras comer hoy</p>
    </div>

    <div class="row g-0">
        <div class="col-12 text-center">
            <a href="{{ url('/bondiola') }}" class="text-decoration-none text-white d-block">
                <img src="{{ asset('Img/FotoBondiolaCatalogo.jpg') }}" class="w-100 d-block" alt="Foto de Bondiola" style="height: 570px; object-fit: cover;">
            </a>
        </div>

        <div class="col-12 text-center mt-1">
            <a href="{{ url('/milanesas') }}" class="text-decoration-none text-white d-block">
                <img src="{{ asset('Img/FotoMilanesaCatalogo.jpg') }}" class="w-100 d-block" alt="Foto de Milanesa" style="height: 570px; object-fit: cover;">
            </a>
        </div>

        <div class="col-12 text-center mt-1">
            <a href="{{ url('/pastas') }}" class="text-decoration-none text-white d-block">
                <img src="{{ asset('Img/FotoPastasCatalogo.jpg') }}" class="w-100 d-block" alt="Foto de Pastas" style="height: 570px; object-fit: cover;">
            </a>
        </div>
    </div>
    </div>

    <footer class="bg-dark text-white pt-5 pb-4 mt-5 border-top border-warning border-3 mb-0">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start justify-content-between">

                <div class="col-md-4 mx-auto mb-4 text-center">
                    <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-2 mb-3 shadow" width="100" height="100" alt="Logo" style="object-fit: contain;">
                    <h5 class="text-uppercase fw-bold text-warning estilo-marca">The Good Taste</h5>
                    <p>Comida de verdad, hecha con cariño.</p>
                </div>

                <div class="col-md-4 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Encuéntranos</h6>
                    <p><i class="bi bi-geo-alt-fill me-2 text-warning"></i> Calle 9 de Julio 1234, Corrientes.</p>
                    <p><i class="bi bi-telephone-fill me-2 text-warning"></i> +54 3794 12-3456</p>
                    <p><i class="bi bi-envelope-fill me-2 text-warning"></i> thegoodtaste@gmail.com</p>
                </div>

                <div class="col-md-4 mx-auto mb-md-0 mb-4 text-center text-md-start">
                    <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Nuestras Redes</h6>
                    <div class="d-flex justify-content-center justify-content-md-start gap-4 fs-1 mt-2">
                        <a href="https://instagram.com/elevate.dis" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-instagram hover-warning"></i>
                        </a>
                        <a href="https://facebook.com/adrian.obregon.3701/" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-facebook hover-warning"></i>
                        </a>
                        <a href="https://wa.me/543794123456" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-whatsapp hover-warning"></i>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="mb-4 text-secondary">
            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-0 text-secondary small">© 2026 The Good Taste. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <button id="btnArriba" class="btn btn-warning shadow rounded-circle" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050; display: none;" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="bi bi-arrow-up fs-4"></i>
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