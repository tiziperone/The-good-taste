<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Nueva Contraseña</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #1a1d20;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-restablecer {
            background-color: #212529;
            border: 2px solid #ffc107;
            border-radius: 15px;
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .form-control-custom {
            background-color: #1a1d20 !important;
            border: 1px solid #495057 !important;
            color: #fff !important;
        }

        .form-control-custom:focus {
            border-color: #ffc107 !important;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25) !important;
        }

        .input-group-text-custom {
            background-color: #1a1d20 !important;
            border: 1px solid #495057 !important;
            color: #fff !important;
        }

        .btn-warning-custom {
            background-color: #ffc107;
            border: none;
            font-weight: 700;
            color: #000;
            padding: 0.75rem;
            transition: background-color 0.3s ease;
        }

        .btn-warning-custom:hover {
            background-color: #e0a800;
            color: #000;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="card-restablecer">

            <div class="text-center mb-4">
                <img src="{{ asset('Img/LogoOscuro.png') }}" alt="Logo The Good Taste" style="max-width: 80px; height: auto;">
            </div>

            <div class="text-center text-white mb-4">
                <h2 class="fw-bold fs-3 mb-2">Nueva Contraseña</h2>
                <p class="text-muted small">Ingresá tu nueva clave de acceso para tu cuenta.</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger bg-danger text-white border-0 small mb-4 py-2 rounded-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label for="password" class="form-label text-white fw-bold small">Nueva Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text input-group-text-custom"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control form-control-custom" placeholder="Mínimo 8 caracteres" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label text-white fw-bold small">Confirmar Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text input-group-text-custom"><i class="bi bi-lock-check"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-custom" placeholder="Repetí tu contraseña" required>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning-custom rounded-3">
                        Actualizar Contraseña <i class="bi bi-check-circle align-middle ms-1"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>