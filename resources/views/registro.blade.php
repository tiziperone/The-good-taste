<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Good Taste - Registro</title>
    <link class="rounded-circle" rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #1a1d20;
        }

        .register-card {
            background-color: #212529;
            border: 1px solid #ffc107;
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

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }

        .text-link {
            color: #ffc107;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
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
            <div class="col-md-8 col-lg-6">

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-octagon-fill me-2"></i>
                    @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span><br>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card register-card p-4">
                    <div class="text-center my-2">
                        <img src="{{ url('/Img/LogoOscuro.jpg')}}" class="rounded-circle p-1 mx-auto d-block mb-3" width="70" height="70" alt="logo">
                        <h2 class="fw-bold tracking-tight">Crea tu Cuenta</h2>
                        <p class="text-white-50 small">Regístrate para disfrutar de "The Good Taste"</p>
                    </div>

                    <form action="{{ url('/registro') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="nombre" class="form-label small fw-bold">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nombre" id="nombre" class="form-control bg-dark text-white border-secondary" placeholder="Juan" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Por favor, ingrese solo letras." required value="{{ old('nombre') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="apellido" class="form-label small fw-bold">Apellido</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-person text-transparent"></i></span>
                                    <input type="text" name="apellido" id="apellido" class="form-control bg-dark text-white border-secondary" placeholder="Pérez" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Por favor, ingrese solo letras." required value="{{ old('apellido') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control bg-dark text-white border-secondary" placeholder="correo@ejemplo.com" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="password" class="form-label small fw-bold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control bg-dark text-white border-secondary" placeholder="Mín. 8 caracteres" minlength="8" oninput="validarContrasenas()" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <label for="password_confirmation" class="form-label small fw-bold">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-dark text-white border-secondary" placeholder="Repite contraseña" minlength="8" oninput="validarContrasenas()" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="checkbox form-check-input" id="terminos" name="terminos" required>
                            <label class="form-check-label small text-white-50" for="terminos">
                                Acepto los <a href="{{ url('/terminos-y-usos') }}" class="text-link" target="_blank">Términos y Usos</a> de la plataforma.
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom py-2 shadow-sm">
                                Crear Cuenta <i class="bi bi-person-plus-fill ms-1"></i>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-white-50 mb-0">¿Ya tienes una cuenta? <a href="{{ url('/inicio-sesion') }}" class="text-link fw-bold">Inicia Sesión</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        function validarContrasenas() {
            const password = document.getElementById("password");
            const confirmation = document.getElementById("password_confirmation");

            if (password.value !== confirmation.value) {
                // Si no coinciden, seteamos el mensaje de error personalizado que mostrará el navegador
                confirmation.setCustomValidity("Las contraseñas no coinciden.");
            } else {
                // Si coinciden, limpiamos el error para que deje enviar el formulario
                confirmation.setCustomValidity("");
            }
        }
    </script>
</body>

</html>