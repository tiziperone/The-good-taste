<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Comercialización</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

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

    <div class="container mt-4 mb-2">
        <div class="d-flex gap-2">
            <button onclick="history.back()" class="btn-navegacion" title="Volver atrás">
                <i class="bi bi-arrow-left"></i>
            </button>

            <button onclick="history.forward()" class="btn-navegacion" title="Ir adelante">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>

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
                    <ul class="list-group list-group-flush fw-bold text-justify">
                        <li class="list-group-item">Retiro en el local: Podés pasar a buscar tu pedido en el horario acordado.</li>
                        <li class="list-group-item text-justify">Entrega a domicilio: Realizamos envíos dentro de la zona, coordinando día y horario previamente.</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-3 p-3 shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/caja.png') }}" class="card-img-top" alt="...">
                    <div class="card-body text-justify">
                        <h5 class="card-title fw-bold">Tipos de envío</h5>
                        <p class="card-text">Nuestros envíos se realizan de manera cuidada para garantizar que los productos lleguen en perfectas condiciones:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold text-justify">
                        <li class="list-group-item">Entregas programadas.</li>
                        <li class="list-group-item">Pedidos preparados en el día.</li>
                        <li class="list-group-item">Embalaje seguro para conservar la calidad de los alimentos.</li>
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
                        <li class="list-group-item">Efectivo.</li>
                        <li class="list-group-item">Transferencia Bancaria.</li>
                        <li class="list-group-item">Billeteras virtuales.</li>
                    </ul>
                </div>
            </div>
        </div>






        <div class="row justify-content-center mt-5 text-center">

            <h3 class="fw-bold mb-4">¿Cómo realizar un pedido?</h3>

            <!-- Paso 1 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 1.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">Elegís los productos del menú</p>
                    </div>
                </div>
            </div>

            <!-- Paso 2 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 2.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">Le das click a Comprar</p>
                    </div>
                </div>
            </div>

            <!-- Paso 3 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 3.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">Coordinamos pago y entrega</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-5 mb-3">
            <div class="col-md-6">
                <div class="card p-4 shadow text-center bg-warning text-dark border border-3 border-dark">

                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        Información importante
                    </h5>

                    <p class="fw-bold mb-3">
                        Todos nuestros productos son caseros. Se recomienda pedir con anticipación.
                        Los tiempos de entrega pueden variar según la demanda.
                    </p>

                </div>
            </div>
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

    <footer class="bg-dark text-white pt-5 pb-3 mt-5 border-top border-warning border-3 mb-0">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start justify-content-between">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto text-center">
                    <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-2 mb-3 shadow" width="120" height="120" alt="The Good Taste Logo" style="object-fit: contain;">
                    <h5 class="text-uppercase fw-bold text-warning estilo-marca">The Good Taste</h5>
                    <p>Comida de verdad, con ingredientes reales y mucho cariño.</p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Encuéntranos</h6>
                    <p><i class="bi bi-geo-alt-fill me-2 text-warning"></i> Calle 9 de Julio 1234.</p>
                    <p><i class="bi bi-globe-americas me-2 text-warning"></i> Corrientes, Argentina. CP 3400.</p>
                    <p><i class="bi bi-envelope-fill me-2 text-warning"></i> thegoodtaste@gmail.com</p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center text-md-start">
                    <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Nuestras Redes</h6>
                    <div class="d-flex justify-content-center justify-content-md-start gap-4 fs-2 mt-3">
                        <a href="https://instagram.com/elevate.dis" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-instagram hover-warning"></i>
                        </a>
                        <a href="https://facebook.com/adrian.obregon.3701/" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-facebook hover-warning"></i>
                        </a>
                        <a href="https://wa.me/5493794000000" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-whatsapp hover-warning"></i>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="mb-4 text-secondary">
            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-0 text-secondary">© 2026 The Good Taste. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>