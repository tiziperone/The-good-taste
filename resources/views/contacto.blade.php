<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Contacto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>

    <style>
        /* Ajuste de ancho de inputs responsivo */
        .input-contacto {
            width: 90%;
        }

        @media (min-width: 768px) {
            .input-contacto {
                width: 70%;
            }
        }

        @media (min-width: 992px) {
            .divisor-naranja {
                border-right: 2px solid #ffc107;
            }

            .input-contacto {
                width: 60%;
            }
        }

        @media (max-width: 991px) {
            .divisor-naranja {
                border-bottom: 2px solid #ffc107;
                padding-bottom: 2rem;
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>
    <hr class="border-warning border-2 opacity-100">

    <div class="container-xl mt-2">
        <div class="row">
            <div class="col-lg-6 text-center mt-4 mb-5 mb-lg-0 pe-lg-4 divisor-naranja">
                <img src="{{ url('/Img/LogoOscuroContacto.webp') }}" class="rounded-circle p-3 mx-auto d-block w-25" alt="logo">

                <form action="{{ url('/contacto') }}" method="POST">
                    @csrf
                    <div class="row mt-4 justify-content-center">
                        @guest
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5 mb-1">Nombre</label>
                            <input type="text" name="nombre" class="form-control input-contacto mx-auto" placeholder="Ingrese su nombre..." pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras." required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5 mb-1">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control input-contacto mx-auto" placeholder="correo@ejemplo.com" required>
                        </div>
                        @else
                        <div class="col-12 mb-3 text-warning">
                            <p>Hola, <strong>{{ auth()->user()->name }}</strong>. ¿En qué podemos ayudarte?</p>
                        </div>
                        <input type="hidden" name="nombre" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        @endguest

                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5 mb-1">Asunto</label>
                            <input type="text" name="asunto" class="form-control input-contacto mx-auto" placeholder="Motivo de su consulta..." required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5 mb-1">Mensaje</label>
                            <textarea name="mensaje" class="form-control input-contacto mx-auto" rows="4" placeholder="Ingrese su mensaje..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 px-4 py-2 fw-bold">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 ps-lg-4 text-center d-flex flex-column align-items-center">
                <h2 class="mt-3">Nos podés encontrar en:</h2>
                <!-- Se agregó la clase w-100 para que el mapa no se desborde en celulares -->
                <div class="w-100 px-3 mt-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d837.2926772310801!2d-59.219791729866046!3d-28.046017172031114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e1!3m2!1ses-419!2sar!4v1788055942012!5m2!1ses-419!2sar" height="300" class="w-100 rounded shadow" style="border:0; max-width: 500px;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>

                <!-- SECCIÓN ACTUALIZADA CON LA DIRECCIÓN -->
                <div class="mt-4 p-3 border-top border-warning w-75">
                    <p class="fs-5 fw-bold mb-0">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i> 9 de Julio N°223 Florencia, Santa Fe.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>