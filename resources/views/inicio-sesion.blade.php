<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Good Taste - Inicio de sesion</title>
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

        .login-card {
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
            <div class="col-md-6 col-lg-5">

                @if($errors->has('email_no_existe') || session('error_registro'))
                <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    ¡Vaya! No encontramos ninguna cuenta con ese correo.
                    <a href="{{ url('/registro') }}" class="alert-link text-decoration-underline">¿Quieres registrarte ahora?</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->has('password_incorrecta'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-shield-slash-fill me-2"></i>
                    La contraseña ingresada es incorrecta. ¡Vuelve a intentarlo!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Esto sirve por si mandás un error general desde el controlador con ->with('error', '...') o si falla Auth::attempt() --}}
                @if(session('error') || $errors->has('auth_failed'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-x-circle-fill me-2"></i>
                    {{ session('error') ?? 'Las credenciales ingresadas no coinciden con nuestros registros.' }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card login-card p-4">
                    <div class="text-center my-3">
                        <img src="{{ url('/Img/LogoOscuro.jpg')}}" class="rounded-circle p-1 mx-auto d-block mb-3" width="70" height="70" alt="logo">
                        <h2 class="fw-bold tracking-tight">¡Bienvenido!</h2>
                        <p class="text-white-50 small">Ingresa tus credenciales para continuar</p>
                    </div>

                    <form action="{{ url('/inicio-sesion') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control bg-dark text-white border-secondary" placeholder="ejemplo@correo.com" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control bg-dark text-white border-secondary" placeholder="********" required>
                            </div>
                            <div class="text-end mt-2">
                                <a href="#" class="text-link small text-white-50">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label small text-white-50" for="remember">Recordar sesión</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom py-2 shadow-sm">
                                Iniciar Sesión <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-white-50 mb-0">¿Aún no tienes cuenta? <a href="{{ url('/registro') }}" class="text-link fw-bold">Regístrate</a></p>
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