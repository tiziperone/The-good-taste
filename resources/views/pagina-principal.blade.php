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
        
        /* Estilos para el botón de ir arriba */
        #btnArriba {
            position: fixed; 
            bottom: 20px; 
            right: 20px; 
            display: none; 
            z-index: 1050; 
            border: none; 
            background: transparent; 
            color: #ffc107; 
            font-size: 2.5rem;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-personalizada">
        <div class="container-fluid">
            <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="{{ url('/pagina-principal') }}">
                <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
                <span class="estilo-marca">The good taste</span>
            </a>
            
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
            <div class="col-10 col-md-8 bg-white mt-3">
                <h2 class="estilo-marca-2 fs-2 fw-bold text-dark mb-3 card-title">Bondiola, milanesas y pastas caseras todos los días.</h2>
                <p class="fs-4 text-muted">Cocinamos con ingredientes reales para que disfrutes comida de verdad.</p>

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
                <a href="{{ url('/contacto') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100 py-4 card-hover">
                        <i class="bi bi-journal-text display-3 text-success mb-2"></i>
                        <h4 class="fw-bold">Haz tu pedido</h4>
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

    <button id="btnArriba" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Volver arriba">
        <i class="bi bi-arrow-up-circle-fill"></i>
    </button>

    <script>
        // Lógica para mostrar/ocultar el botón flotante
        window.addEventListener('scroll', () => {
            const btn = document.getElementById('btnArriba');
            btn.style.display = window.scrollY > 300 ? 'block' : 'none';
        });
    </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html> <!--hola-->