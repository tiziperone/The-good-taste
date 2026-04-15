<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Contacto </title>
    
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

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
<!--Hola-->
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
<nav class="navbar navbar-expand-sm mb-3 navbar-personalizada">
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

<!--En la siguiente porcion de codigo se crean columnas con margenes y dentro de ellas se colocan
los campos de texto para ingresar nombre, correo y mensaje, ademas de un boton para enviar el
formulario-->
<div class="container-xl  text-center">

<div class="container text-center">
    <img src="{{ url('/Img/LogoOscuro.jpg')}}" 
        class="rounded-circle bg-dark p-3 mx-auto d-block w-25" 
        alt="logo">
    </div>

    <div class="row mt-4">
        <div class="col-12 bg-dark p-4 text-white">

            <label class="fw-bold fs-5">Nombre</label>

            <form action="{{ url('/contacto') }}" method="POST">
        @csrf <div class="mb-3">
    <input type="text" name="nombre" class="form-control w-75 mx-auto" placeholder="Ingrese su nombre...">
</div>
</div>

<div class="col-12  p-4 bg-dark text-white">
    
                <label class="fw-bold fs-5">Correo Electrónico</label>

            <div class="mb-3">
            <input type="email" name="email" class="form-control w-75 mx-auto" placeholder="correo@ejemplo.com">
        </div>
    </div>

<div class="col-12 bg-dark text-white">
    
            <label class="fw-bold fs-5">Mensaje</label>

        <div class="mb-3">
            <textarea name="mensaje" class="form-control w-75 mx-auto" placeholder="Escriba su mensaje aquí..."
            rows="3"></textarea>
        </div>
    </div>

    
<div class="col-12 gap-3 mx-auto bg-dark">
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
    </div>
</div>
</form>
</body>
</html>



