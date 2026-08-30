<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Usuarios</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>

    <style>
        .sidebar-menu .nav-link {
            color: #fff;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
            display: block;
        }

        .sidebar-menu .nav-link:hover {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .sidebar-menu .nav-link.active {
            background-color: #ffc107 !important;
            color: #212529 !important;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container-fluid px-4 mt-5 mb-5">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 mb-4">
                <div class="card bg-dark border-secondary p-3 shadow">
                    <h5 class="fw-bold text-warning mb-3 text-center text-md-start">
                        <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                    </h5>
                    <hr class="border-secondary mt-0">
                    <div class="nav flex-column nav-pills sidebar-menu">
                        <a href="{{ route('admin.index') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-house-door-fill me-2"></i> Inicio</a>
                        <a href="{{ route('admin.productos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos</a>
                        <a href="{{ route('admin.pedidos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos</a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas</a>
                        <a href="{{ route('admin.usuarios') }}" class="nav-link active text-start border-0"><i class="bi bi-people-fill me-2"></i> Gestión de Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Tablas de Usuarios (Mantiene todo tu código de iteración y botones) -->
            <div class="col-md-9 col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-shield-lock-fill me-2"></i> Administradores</h2>
                </div>
                <!-- ... tablas de administradores y usuarios ... -->
            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>