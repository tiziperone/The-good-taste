<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Recibido</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    
</head>

<body>

<div class="container mt-4 mb-2">
    <div class="d-flex gap-2">
        <button onclick="history.back()" class="btn-navegacion" title="Volver atrás">
            <i class="bi bi-arrow-left"></i>
        </button>

        <button onclick="history.forward()" class="btn-navegacion" title="Ir adelante">
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
</div>

    <!--Se realiza una estructura de columnas para mostrar que el mensaje se envio con exito
tambien se da la posibilidad de volver al inicio del sitio web (pagina principal)-->
    <div class="container mt-5">
        <div class="row justify-content-center"><!--Se centra el contenido dentro de la fila-->
            <div class="col-8 text-center bg-light p-5"><!--Se crea una columna de 8 unidades, se centra el texto, se le da un fondo claro, padding-->
                <h2 class="text-success">¡Mensaje enviado con éxito!</h2><!--Se muestra un mensaje de éxito con un estilo de texto verde-->
                <p class="mt-4 fs-5">Hola <strong>{{ $nombre }}</strong>, gracias por contactarnos.</p>
                <!
                    <p>Hemos recibido su mensaje, pronto le responderemos a: <strong>{{ $email }}</strong>.</p>
                    <a href="{{ url('/pagina-principal') }}" class="btn btn-primary mt-4">Volver al Inicio</a>

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
    
</body>

</html>