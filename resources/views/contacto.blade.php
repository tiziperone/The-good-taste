<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuroRedondoTransparente.png') }}" type="image-png">
    <title>The Good Taste - Contacto </title>
    
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<!--Barra de navegacion-->
<nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="#">The good taste</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active mx-2" aria-current="page" href="{{ url('/pagina-principal') }}">Inicio</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/bondiola') }}">Bondiola</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/milanesas') }}">Milanesas</a>
        <a class="nav-link mx-2 text-black" href="{{ url('/pastas') }}">Pastas</a>
      </div>
    </div>
  </div>
</nav>

<!--En la siguiente porcion de codigo se crean columnas con margenes y dentro de ellas se colocan
los campos de texto para ingresar nombre, correo y mensaje, ademas de un boton para enviar el
formulario-->
<div class="container-xl mt-5">
    <div class="row">
        <div class="col-6 bg-light p-5">
        Nombre
            <form action="{{ url('/contacto') }}" method="POST">
        @csrf <div class="mb-3">
    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre...">
</div>
</div>

<div class="col-6 bg-light p-5">
    Correo electrónico
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com">
    </div>
</div>

<div class="col-12 bg-light p-5">
    Mensaje
    <div class="mb-3">
        <textarea name="mensaje" class="form-control" placeholder="Escriba su mensaje aquí..."
        rows="3"></textarea>
    </div>
</div>

<div class="col-6 bg-light p-5">
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
    </div>
</div>


<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</form>
</body>
</html>



