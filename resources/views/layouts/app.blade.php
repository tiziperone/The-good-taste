<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Token de seguridad global para Laravel (IMPORTANTE para el carrito) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Íconos -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('Img/LogoOscuroIOS.webp') }}">
    <link rel="icon" type="image/webp" sizes="192x192" href="{{ asset('Img/LogoOscuroAndroid.webp') }}">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.webp') }}" type="image-webp">

    <title>@yield('titulo', 'The Good Taste')</title>

    <!-- Fuentes y Estilos Globales -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Scripts Globales (SOLO SWUP Y BOOTSTRAP) -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://unpkg.com/swup@4" defer></script>
    <script src="https://unpkg.com/@swup/scripts-plugin@3" defer></script>
    <script src="https://unpkg.com/@swup/preload-plugin@3" defer></script>

    <style>
        /* Transición de vistas global - ACELERADA A 0.15s */
        .transition-fade {
            transition: opacity 0.15s ease-out;
            opacity: 1;
        }

        html.is-animating .transition-fade {
            opacity: 0;
        }
    </style>

    <!-- Espacio para inyectar CSS específico de cada vista -->
    @yield('estilos')
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <!-- CONTENEDOR PRINCIPAL SWUP -->
    <main id="swup" class="transition-fade">
        <!-- Aquí se inyectará el contenido de cada página -->
        @yield('contenido')
    </main>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (!window.swup) {
                window.swup = new Swup({
                    containers: ['#swup-navbar', '#swup'],
                    plugins: [
                        new SwupScriptsPlugin(),
                        new SwupPreloadPlugin()
                    ]
                });
            }
        });
    </script>

    <!-- Espacio para inyectar JavaScript específico de cada vista -->
    @yield('scripts')

</body>

</html>