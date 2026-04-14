<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Términos y Usos</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->

<style>
    .estilo-marca { /* Clase personalizada para el estilo de la marca en la barra de navegación */
    font-family: 'Montserrat', sans-serif !important;
    font-weight: 900 !important; 
    font-size: 1.5rem !important;
    letter-spacing: 1px;
    text-transform: uppercase; /* Para que combine con el logo*/
    vertical-align: middle;
}
</style>

<style>
.navbar-personalizada {
    background-color: #1a1d20 !important; /* Un gris muy oscuro casi negro */
    border-bottom: 2px solid #333; /* Opcional: una línea sutil abajo */
}

/* Para que los links no se pierdan en el fondo oscuro */
.navbar-personalizada .nav-link {
    color: white !important; /*links sean blancos */
}

.estilo-marca {
    font-family: 'Montserrat', sans-serif !important; /* Aplicamos la fuente "Montserrat" */
    font-weight: 900 !important; /* Aplicamos negrita */
    font-size: 1.4rem !important; /* Aplicamos el tamaño de fuente */
    text-transform: uppercase; /* Aplicamos transformación a mayúsculas */
    color: #ffffff !important; /* Nombre blanco */
}

<style>
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
</style>

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

<div class="container-center bg-dark py-5 mt-5 mb-5 ms-5 me-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 text-white">
            <p>Versión vigente: 14 de abril de 2026</p>
            <h1>Términos y condiciones de uso del sitio</h1>
            <p>Resumen de Términos y Condiciones</p>
            <p style="text-align: justify;">The Good Taste es un emprendimiento artesanal dedicado a la fabricación y comercialización de productos alimenticios de alta calidad, incluyendo bondiolas, milanesas y pastas. Al utilizar nuestro sitio web, aceptas las condiciones de navegación y los procedimientos de venta detallados a continuación.</p>
            <h3>1. Capacidad</h3>
            <p style="text-align: justify;">Para realizar consultas o registros en nuestro sitio, debes ser mayor de edad con capacidad legal para contratar. Los menores de edad deberán contar con la supervisión de un adulto responsable.</p>
            <h3>2. Registro y Privacidad de Datos</h3>
            <p style="text-align: justify;">Quien desee utilizar nuestros servicios opcionales de registro o formularios de consulta, deberá completar los datos requeridos de manera exacta y verdadera.
                Privacidad: Hacemos un uso responsable de tu información personal. Los datos recolectados se utilizan exclusivamente para gestionar tus pedidos y mejorar tu experiencia de compra.</p>
            <h3>3. Catálogo de Productos y Comercialización</h3>
            <p style="text-align: justify;">Los productos visualizados en nuestro catálogo (como nuestras milanesas, bondiolas y pastas) se presentan de manera estática para fines informativos.
                Precios: Nos reservamos el derecho de modificar los precios y la disponibilidad de los productos sin previo aviso.
                Fabricación: Todos los productos son de fabricación propia y artesanal, garantizando la frescura de la materia prima.</p>
            <h3>4. Envíos y Retiros</h3>
            <p style="text-align: justify;">De acuerdo con nuestra política de comercialización, ofrecemos dos modalidades para que recibas tus productos:
                Retiro en Local (Take Away): El cliente podrá retirar su pedido directamente en nuestro domicilio legal una vez confirmada la preparación.
                Envío a Domicilio: Realizamos repartos en zonas seleccionadas. Los tiempos de entrega y costos de envío se coordinarán al momento de la consulta.</p>
            <h3>5. Propiedad Intelectual</h3>
            <p style="text-align: justify;">The Good Taste es propietario de todos los derechos de propiedad intelectual sobre el contenido del sitio, incluyendo logos, diseños de tarjetas de productos, imágenes y códigos de programación. Queda prohibida la reproducción total o parcial del contenido sin autorización previa.</p>
            <h3>6. Garantía y Soporte</h3>
            <p style="text-align: justify;">Al tratarse de productos alimenticios perecederos, garantizamos la calidad de los mismos hasta el momento de la entrega. Ante cualquier inconveniente, el cliente debe comunicarse inmediatamente a través de nuestra sección de "Contáctanos".</p>
            <h3>7. Jurisdicción y Ley Aplicable</h3>
            <p style="text-align: justify;">Estos términos se rigen por las leyes de la República Argentina. Para cualquier controversia, las partes se someten a los tribunales ordinarios de la ciudad de Corrientes, Argentina.</p>
        </div>
    </div>
</div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>