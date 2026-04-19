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

    <style>
        .estilo-marca {
            /* Clase personalizada para el estilo de la marca en la barra de navegación */
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 900 !important;
            font-size: 1.5rem !important;
            letter-spacing: 1px;
            text-transform: uppercase;
            /* Para que combine con el logo*/
            vertical-align: middle;
        }

        

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
            transform: scale(1.08);
            /* Se agranda un 8% */
            z-index: 10;
            /* Se pone por encima de todas las demás */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            /* Sombra para dar profundidad de que "vuela" */
        }



        .navbar-personalizada {
            background-color: #1a1d20 !important;
            /* Un gris muy oscuro casi negro */
            border-bottom: 2px solid #333;
            /* Opcional: una línea sutil abajo */
        }

        /* Para que los links no se pierdan en el fondo oscuro */
        .navbar-personalizada .nav-link {
            color: white !important;
            /*links sean blancos */
        }

        .estilo-marca {
            font-family: 'Montserrat', sans-serif !important;
            /* Aplicamos la fuente "Montserrat" */
            font-weight: 900 !important;
            /* Aplicamos negrita */
            font-size: 1.4rem !important;
            /* Aplicamos el tamaño de fuente */
            text-transform: uppercase;
            /* Aplicamos transformación a mayúsculas */
            color: #ffffff !important;
            /* Nombre blanco */
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

    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-12">
                <a href="{{ url('/bondiola') }}">
                    <img src="{{ asset('Img/FotoBondiolaCatalogo.png') }}"
                        class="w-100 d-block"
                        alt="Foto de Bondiola"
                        style="height: 570px; object-fit: cover;">
                </a>
            </div>

            <div class="col-12">
                <a href="{{ url('/milanesas') }}">
                    <img src="{{ asset('Img/FotoMilanesaCatalogo.png') }}"
                        class="w-100 d-block"
                        alt="Foto de Milanesa"
                        style="height: 570px; object-fit: cover;">
                </a>
            </div>

            <div class="col-12">
                <a href="{{ url('/pastas') }}">
                    <img src="{{ asset('Img/FotoPastasCatalogo.png') }}"
                        class="w-100 d-block"
                        alt="Foto de Pastas"
                        style="height: 570px; object-fit: cover;">
                </a>
            </div>
        </div>
    </div>

    <style>
        /* Esto es lo único que necesitas para que en celular sea automático */
        @media (max-width: 768px) {
            img {
                height: auto !important;
            }
        }
    </style>

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