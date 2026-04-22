<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Términos y Usos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* Eliminamos márgenes del body para que el footer ocupe el 100% abajo */
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .hover-warning:hover {
            color: #ffc107 !important;
            transition: color 0.3s ease;
        }
    </style>
</head>

<body class="bg-light">

    @include('componentes.navbar')

    <div class="container mt-4 mb-2">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <div class="container bg-dark text-white py-5 my-5 rounded-3 shadow">
        <div class="row justify-content-center">
            <div class="col-11 col-md-10 col-lg-8">
                <p class="text-secondary small mb-1">Versión vigente: 14 de abril de 2026</p>
                <h1 class="mb-0 fw-bold" style="color: #f8f9fa;">Términos y condiciones de uso del sitio</h1>
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
                    <p class="text-secondary small">© 2026 The Good Taste - Corrientes, Argentina.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('componentes.botonHaciaArriba')

    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>