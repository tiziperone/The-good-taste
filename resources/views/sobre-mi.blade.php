<!DOCTYPE html>
<html lang="es">
<head> 

</head>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<body>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>

            <div class="navbar-nav">
                <a class="nav-link" href="/">Inicio</a>
                <a class="nav-link active" href="/sobre-mi">Sobre mí</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="card">
            <div class="card-body">
                <h1 class="card.tittle">Sobre mi</h1>

                <p><b>Nombre:</b> Tiziano Perone</p>
                <p><b>Edad:</b> 20 años</p>
                <p><b>De donde soy:</b> Corrientes, Argentina</p>
                <p><b>Expectitivas del curso:</b> Aprender Laravel</p>
                <p><b>Hobbies:</b> Programar y deportes</p>

                <a href="#" class="btn btn-primary mt-3">Descargar CV</a>
                <a href="#" class="btn btn-secondary mt-3">Contactar</a>

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h2>Formulario de contacto</h2>

            <form>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese su nombre">
</div>

<div class="mb-3">
    <label class="form-label">Mensaje</label>
    <textarea class="form-control" rows="3"></textarea>
</div>

<button type="submit" class="btn btn-success">
    Enviar Mensaje
        </button>
        </form>
    </div>

</div>

    

</body>
</html>