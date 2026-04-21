<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Contacto </title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>

<body>

    <body class="bg-dark text-white">
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
            <!--En la siguiente porcion de codigo se crean columnas con margenes y dentro de ellas se colocan
los campos de texto para ingresar nombre, correo y mensaje, ademas de un boton para enviar el
formulario-->

            <!-- Contenido de conteiner -->
            <div class="container-xl container-sm-3  text-center">

                <img src="{{ url('/Img/LogoOscuro.jpg')}}"
                    class="rounded-circle p-3 mx-auto d-block w-25"
                    alt="logo">

                <!-- FORM -->
                <form action="{{ url('/contacto') }}" method="POST">
                    @csrf

                    <div class="row mt-4 justify-content-center">

                        <!-- Nombre -->
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Nombre</label>
                            <input type="text" name="nombre" class="form-control w-auto mx-auto" placeholder="Ingrese su nombre...">
                        </div>

                        <!-- Email -->
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control w-auto mx-auto" placeholder="correo@ejemplo.com">
                        </div>

                        <!-- Mensaje -->
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Mensaje</label>
                            <textarea name="mensaje" class="form-control w-auto mx-auto" placeholder="Ingrese su mensaje..." rows="5"></textarea>
                        </div>

                        <!-- Botón -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3">
                                Enviar Mensaje
                            </button>
                        </div>

                    </div>

                </form>

            </div>

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
                    <button id="btnArriba" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="position: fixed; bottom: 20px; right: 20px; display: none; z-index: 1050; border: none; background: transparent; color: #ffc107; font-size: 2rem;">
                        <i class="bi bi-arrow-up-circle-fill"></i>
                    </button>

                    <script>
                        window.addEventListener('scroll', () => {
                            const btn = document.getElementById('btnArriba');
                            btn.style.display = window.scrollY > 300 ? 'block' : 'none';
                        });
                    </script>

                    <hr class="mb-4 text-secondary">
                    <div class="row text-center">
                        <div class="col-12">
                            <p class="mb-0 text-secondary">© 2026 The Good Taste. Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </footer>

    </body>

</html>