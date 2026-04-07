<!DOCTYPE html>
<html lang="es">
<head> 

</head>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<body>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand mx-4" href="#">The good taste</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active mx-2" aria-current="page" href="#">Inicio</a>
        <a class="nav-link mx-2" href="#">Carnes</a>
        <a class="nav-link mx-2" href="#">Fiambres</a>
        <a class="nav-link mx-2" href="#">Pastas</a>
      </div>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="max-height: 600px">
        <!--Imagen de bondiola-->
      <img src="https://i.ytimg.com/vi/ShJ7-HRHCeQ/maxresdefault.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 600px">
        <!--Imagen de milanesas-->
      <img src="https://receitasobremesa.com.br/wp-content/uploads/2023/06/Frango-Americano-Super-Crocante-1-1024x683.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 600px">
        <!--Imagen de pastas-->
      <img src="https://www.lavanguardia.com/files/og_thumbnail/files/fp/uploads/2022/11/04/6364f9e82203a.r_d.662-502-0.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    

        <div class="card mt-4">
            <div class="card-body">
                <div class="container.fluid bg-body-tertiary p-5">
                <h2>Contactanos </h2>

            <form>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese su nombre...">
</div>

<div class="mb-3">
    <label class="form-label">Mensaje</label>
    <textarea class="form-control" placeholder="Ingrese su mensaje..." rows="3"></textarea>
</div>

<button type="submit" class="btn btn-success">
    Enviar Mensaje
        </button>
        </form>
    </div>

</div>

    

</body>
</html>