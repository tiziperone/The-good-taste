<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Términos y Usos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    
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

<div class="container-fluid bg-white text-white py-4 position-relative">
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


<div class="container bg-dark text-white py-5 my-5 rounded-3 shadow">
    <div class="row justify-content-center">
        <div class="col-11 col-md-10 col-lg-8">
            <p class="text-secondary small mb-1">Versión vigente: 14 de abril de 2026</p>
            <h1 class="mb-4 fw-bold" style="color: #f8f9fa;">Términos y condiciones de uso del sitio</h1>
            <p class="lead border-bottom pb-3 mb-4 text-info">Resumen de Términos y Condiciones</p>
            
            <div class="lh-base" style="text-align: justify;">
                <p>The Good Taste es un emprendimiento artesanal dedicado a la fabricación y comercialización de productos alimenticios de alta calidad, incluyendo bondiolas, milanesas y pastas. Al utilizar nuestro sitio web, aceptas las condiciones de navegación y los procedimientos de venta detallados a continuación.</p>

                <h3 class="mt-5 mb-3 text-warning">1. Capacidad</h3>
                <p>Para realizar consultas o registros en nuestro sitio, debes ser mayor de edad con capacidad legal para contratar. Los menores de edad deberán contar con la supervisión de un adulto responsable.</p>

                <h3 class="mt-5 mb-3 text-warning">2. Registro y Privacidad de Datos</h3>
                <p>Quien desee utilizar nuestros servicios opcionales de registro o formularios de consulta, deberá completar los datos requeridos de manera exacta y verdadera.</p>
                <p><strong>Privacidad:</strong> Hacemos un uso responsable de tu información personal. Los datos recolectados se utilizan exclusivamente para gestionar tus pedidos y mejorar tu experiencia de compra.</p>

                <h3 class="mt-5 mb-3 text-warning">3. Catálogo de Productos y Comercialización</h3>
                <p>Los productos visualizados en nuestro catálogo (como nuestras milanesas, bondiolas y pastas) se presentan de manera estática para fines informativos.</p>
                <p><strong>Precios:</strong> Nos reservamos el derecho de modificar los precios y la disponibilidad de los productos sin previo aviso.</p>
                <p><strong>Fabricación:</strong> Todos los productos son de fabricación propia y artesanal, garantizando la frescura de la materia prima.</p>

                <h3 class="mt-5 mb-3 text-warning">4. Envíos y Retiros</h3>
                <p>De acuerdo con nuestra política de comercialización, ofrecemos dos modalidades para que recibas tus productos:</p>
                <ul class="list-unstyled ps-3 border-start border-secondary">
                    <li class="mb-2"><strong>Retiro en Local (Take Away):</strong> El cliente podrá retirar su pedido directamente en nuestro domicilio legal una vez confirmada la preparación.</li>
                    <li><strong>Envío a Domicilio:</strong> Realizamos repartos en zonas seleccionadas. Los tiempos de entrega y costos de envío se coordinarán al momento de la consulta.</li>
                </ul>

                <h3 class="mt-5 mb-3 text-warning">5. Propiedad Intelectual</h3>
                <p>The Good Taste es propietario de todos los derechos de propiedad intelectual sobre el contenido del sitio, incluyendo logos, diseños de tarjetas de productos, imágenes y códigos de programación. Queda prohibida la reproducción total o parcial del contenido sin autorización previa.</p>

                <h3 class="mt-5 mb-3 text-warning">6. Garantía y Soporte</h3>
                <p>Al tratarse de productos alimenticios perecederos, garantizamos la calidad de los mismos hasta el momento de la entrega. Ante cualquier inconveniente, el cliente debe comunicarse inmediatamente a través de nuestra sección de "Contáctanos".</p>

                <h3 class="mt-5 mb-3 text-warning">7. Jurisdicción y Ley Aplicable</h3>
                <p>Estos términos se rigen por las leyes de la República Argentina. Para cualquier controversia, las partes se someten a los tribunales ordinarios de la ciudad de Corrientes, Argentina.</p>
            </div>

            <div class="mt-5 pt-4 border-top text-center">
                <p class="text small">© 2026 The Good Taste - Corrientes, Argentina.</p>
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
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>