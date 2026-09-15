<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Descripción (Soluciona auditoría SEO) -->
    <meta name="description" content="The Good Taste: Elaboración y comercialización de bondiolas y pastas caseras artesanales de alta calidad con envíos y retiros.">

    <!-- Íconos -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('Img/LogoOscuroIOS.jpg') }}">
    <link rel="icon" type="image/jpeg" sizes="192x192" href="{{ asset('Img/LogoOscuroAndroid.jpg') }}">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image/png">

    <title>@yield('titulo', 'The Good Taste')</title>

    <!-- Optimización Fuentes: swap y preconnect para no bloquear renderizado -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    </noscript>

    <!-- CSS Base -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Scripts con defer (Swup corregido sin CDN 404) -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://unpkg.com/swup@4.6.1/dist/Swup.umd.js" defer></script>
    <script src="https://unpkg.com/@swup/preload-plugin@3.2.0/dist/index.umd.js" defer></script>

    <style>
        .transition-fade {
            transition: opacity 0.15s ease-out;
            opacity: 1;
        }

        html.is-animating .transition-fade {
            opacity: 0;
        }
    </style>

    @yield('estilos')
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <main id="swup" class="transition-fade">
        @yield('contenido')
    </main>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Swup !== 'undefined' && !window.swup) {
                const plugins = [];
                if (typeof SwupPreloadPlugin !== 'undefined') {
                    plugins.push(new SwupPreloadPlugin());
                }

                window.swup = new Swup({
                    containers: ['#swup'],
                    plugins: plugins
                });
            }
        });
    </script>

    @yield('scripts')
</body>

</html>