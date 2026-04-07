<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Good Taste - Contacto </title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

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

<button type="submit" class="btn btn-primary">Enviar Mensaje</button>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</form>
</body>
</html>



