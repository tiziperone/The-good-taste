<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Agregamos nuestros middlewares a todas las rutas web
        $middleware->web(append: [
            \App\Http\Middleware\CheckUserActivo::class,    //Primero verifica si está baneado
            \App\Http\Middleware\UpdateUserLastSeen::class, //Si no está baneado, actualiza la última conexión
        ]);
        $middleware->alias([
            'staff' => \App\Http\Middleware\EnsureIsStaff::class,
            'gerente' => \App\Http\Middleware\EnsureIsGerente::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
