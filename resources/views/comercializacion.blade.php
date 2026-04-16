<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Comercialización</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->

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

        .card-animada {
            opacity: 0;
            transform: translateY(30px);
            animation: aparecer 0.8s ease forwards;
        }

        @keyframes aparecer {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

    <div class="container">

        <h1 class="text-center display-3 mt-5 fw-bold">
            Comercialización
        </h1>

        <div class="row justify-content-center">
            <p class="text-center display-6 mt-3 mb-5">
                En The Good Taste trabajamos para que disfrutes comida casera...
            </p>

        </div>




        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-3 p-3 shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/repartidor.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Formas de entrega</h5>
                        <p class="card-text">Ofrecemos distintas opciones para que elijas la que mejor se adapte a vos:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <li class="list-group-item">Retiro en el local: Podés pasar a buscar tu pedido en el horario acordado.</li>
                        <li class="list-group-item">Entrega a domicilio: Realizamos envíos dentro de la zona, coordinando día y horario previamente.</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-3 p-3 shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/caja.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Tipos de envío</h5>
                        <p class="card-text">Nuestros envíos se realizan de manera cuidada para garantizar que los productos lleguen en perfectas condiciones:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <li class="list-group-item">Entregas programadas</li>
                        <li class="list-group-item">Pedidos preparados en el día</li>
                        <li class="list-group-item">Embalaje seguro para conservar la calidad de los alimentos</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-4 p-3 shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/tarjeta-de-credito.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Formas de pago</h5>
                        <p class="card-text">Aceptamos diferentes medios de pago para tu comodidad:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <li class="list-group-item">Efectivo</li>
                        <li class="list-group-item">Transferencia Bancaria</li>
                        <li class="list-group-item">Billeteras virtuales</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <div class="card p-4 shadow text-center">
                    <h3 class="fw-bold">¿Cómo realizar un pedido?</h3>
                    <p>Elegís los productos, nos contactás por redes y coordinamos pago y entrega.</p>
                </div>
            </div>


            <div class="row justifi-content-center mt-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow h-100" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card p-4 shadow text-center">
                        <h5 class="fw-bold">Información importante</h5>
                        <p>Productos caseros. Se recomienda pedir con anticipación. Tiempos pueden variar.</p>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>