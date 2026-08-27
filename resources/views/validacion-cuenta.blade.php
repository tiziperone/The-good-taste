<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Good Taste - Verificar Correo</title>
    <link class="rounded-circle" rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #1a1d20;
            /* Fondo oscuro de la marca */
        }

        .verify-card {
            background-color: #212529;
            /* Tarjeta gris oscura */
            border: 1px solid #ffc107;
            /* Borde amarillo/dorado */
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }

        .btn-custom {
            background-color: #ffc107;
            color: #000000;
            font-weight: 700;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e0a800;
            color: #000000;
            transform: translateY(-2px);
        }

        .text-link {
            color: #ffc107;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
        }

        .icon-pulse {
            color: #ffc107;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 text-center">

                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card verify-card p-5">

                    <div class="mb-4">
                        <i class="bi bi-envelope-check icon-pulse" style="font-size: 4.5rem;"></i>
                    </div>

                    <h2 class="fw-bold tracking-tight mb-3">¡Verifica tu correo electrónico!</h2>

                    <p class="text-white-50 mb-4">
                        Para terminar de crear tu cuenta en <strong>The Good Taste</strong>, te enviamos un correo electrónico con un enlace de validación seguro.
                    </p>

                    <div class="p-3 bg-dark rounded border border-secondary mb-4">
                        <p class="small mb-0 text-white-50">
                            Revisa tu bandeja de entrada (y la carpeta de spam o correo no deseado) y presiona el botón de validación. Una vez hecho esto, serás redirigido automáticamente al inicio de nuestra página.
                        </p>
                    </div>

                    <div class="mt-2">
                        <p class="small text-white-50 mb-2">¿No recibiste el correo electrónico?</p>

                        <form action="{{ url('/validacion-cuenta') }}" method="POST" id="formReenviar">
                            @csrf
                            <button type="submit" class="btn btn-custom py-2 px-4 shadow-sm">
                                Reenviar enlace de validación <i class="bi bi-arrow-clockwise ms-1"></i>
                            </button>
                        </form>
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