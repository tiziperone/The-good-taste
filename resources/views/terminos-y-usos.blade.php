@extends('layouts.app')

@section('titulo', 'The Good Taste - Términos y Usos')

@section('estilos')
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .hover-warning:hover {
        color: #ffc107 !important;
        transition: color 0.3s ease;
    }
</style>
@endsection

@section('contenido')
<div class="container mt-4 mb-4">
    @include('componentes.botonesAtrasAdelante')
</div>

<hr class="border-warning border-2 opacity-100">

<div class="container bg-dark text-white py-5 my-5 rounded-3 shadow">
    <div class="row justify-content-center">
        <div class="col-11 col-md-10 col-lg-8">
            <p class="text-secondary small mb-1">Versión vigente: 14 de abril de 2026</p>
            <h1 class="mb-0 fw-bold" style="color: #f8f9fa;">Términos y condiciones de uso del sitio</h1>
            <p class="lead border-bottom pb-3 mb-4 text-info">Resumen de Términos y Condiciones</p>

            <div class="lh-base" style="text-align: justify;">
                <p>The Good Taste es un emprendimiento artesanal dedicado a la fabricación y comercialización de productos alimenticios de alta calidad, incluyendo bondiolas y pastas artesanales. Al utilizar nuestro sitio web, aceptas las condiciones de navegación y los procedimientos de venta detallados a continuación.</p>

                <h3 class="mt-5 mb-3 text-warning">1. Capacidad</h3>
                <p>Para realizar consultas o registros en nuestro sitio, debes ser mayor de edad con capacidad legal para contratar. Los menores de edad deberán contar con la supervisión de un adulto responsable.</p>

                <h3 class="mt-5 mb-3 text-warning">2. Registro y Privacidad de Datos</h3>
                <p>Quien desee utilizar nuestros servicios opcionales de registro o formularios de consulta, deberá completar los datos requeridos de manera exacta y verdadera. Hacemos un uso responsable de tu información personal exclusivamente para gestionar tus pedidos.</p>

                <h3 class="mt-5 mb-3 text-warning">3. Catálogo de Productos y Comercialización</h3>
                <p>Nos reservamos el derecho de modificar los precios y la disponibilidad de los productos sin previo aviso. Todos los productos son de fabricación propia y artesanal.</p>

                <h3 class="mt-5 mb-3 text-warning">4. Envíos y Retiros</h3>
                <ul class="list-unstyled ps-3 border-start border-secondary">
                    <li class="mb-2"><strong>Retiro en Local (Take Away):</strong> El cliente podrá retirar su pedido directamente en nuestro domicilio legal.</li>
                    <li><strong>Envío a Domicilio:</strong> Realizamos repartos en zonas seleccionadas.</li>
                </ul>

                <h3 class="mt-5 mb-3 text-warning">5. Propiedad Intelectual</h3>
                <p>The Good Taste es propietario de todos los derechos de propiedad intelectual sobre el contenido del sitio. Queda prohibida la reproducción total o parcial sin autorización previa.</p>

                <h3 class="mt-5 mb-3 text-warning">6. Garantía y Soporte</h3>
                <p>Al tratarse de productos alimenticios perecederos, garantizamos la calidad de los mismos hasta el momento de la entrega.</p>

                <h3 class="mt-5 mb-3 text-warning">7. Jurisdicción y Ley Aplicable</h3>
                <p>Estos términos se rigen por las leyes de la República Argentina. Para cualquier controversia, las partes se someten a los tribunales ordinarios de la ciudad de Corrientes, Argentina.</p>
            </div>

            <div class="mt-5 pt-4 border-top text-center">
                <p class="text-secondary small">© 2026 The Good Taste - Corrientes, Argentina.</p>
            </div>
        </div>
    </div>
</div>
@endsection