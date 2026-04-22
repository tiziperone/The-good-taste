<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Contacto </title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* Línea divisoria naranja responsiva */
        @media (min-width: 992px) {
            .divisor-naranja {
                border-right: 2px solid #ffc107;
                /* Color warning de Bootstrap */
            }
        }

        @media (max-width: 991px) {
            .divisor-naranja {
                border-bottom: 2px solid #ffc107;
                /* En celulares se hace horizontal */
                padding-bottom: 2rem;
                margin-bottom: 2rem;
            }
        }
    </style>

</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')
    @include('componentes.botonesAtrasAdelante')


    <div class="container-xl mt-2">
        <div class="row">
            <div class="col-lg-6 text-center mb-5 mb-lg-0 pe-lg-4 divisor-naranja">
                <img src="{{ url('/Img/LogoOscuro.jpg')}}" class="rounded-circle p-3 mx-auto d-block w-25" alt="logo">

                <form action="{{ url('/contacto') }}" method="POST">
                    @csrf
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Nombre</label>
                            <input type="text" name="nombre" class="form-control w-50 mx-auto" placeholder="Ingrese su nombre...">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control w-50 mx-auto" placeholder="correo@ejemplo.com">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-bold fs-5">Mensaje</label>
                            <textarea name="mensaje" class="form-control w-50 mx-auto" rows="4" placeholder="Ingrese su mensaje..."></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3">
                                Enviar Mensaje
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 ps-lg-4 text-center d-flex flex-column align-items-center">

                <h2 class="mt-3">Nos podés encontrar en:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8419.543246690719!2d-58.84103688347966!3d-27.46982387836354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1776819298618!5m2!1ses-419!2sar" class="w-100 rounded-3 shadow-sm mt-2" height="200" style="border:0; max-width: 450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <h2 class="mt-4">Comunicate con nosotros:</h2>
                <a href="https://wa.me/5493794000000" target="_blank" class="text-white text-decoration-none mt-2">
                    <i class="bi bi-whatsapp hover-warning" style="font-size: 4rem;"></i>
                </a>

                <div class="mt-5 p-3 border-top border-warning w-75">
                    <h3 class="fs-5 fw-bold text-warning mb-3">Información Legal</h3>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><strong class="text-white">Titular:</strong> Obregón Adrian, Perone Tiziano.</li>
                        <li class="mb-2"><strong class="text-white">Razón Social:</strong> The Good Taste S.R.L.</li>
                        <li class="mb-2"><strong class="text-white">Domicilio Legal:</strong> Calle 9 de Julio 392, Corrientes </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

</body>

</html>