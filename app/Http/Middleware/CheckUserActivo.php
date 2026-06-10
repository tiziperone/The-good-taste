<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActivo
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos si el usuario está logueado pero su cuenta NO está activa (activo == 0 o false)
        if (Auth::check() && !Auth::user()->activo) {

            // Cerramos su sesión
            Auth::logout();

            // Invalidamos la sesión actual y regeneramos el token por seguridad
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Lo expulsamos a la pantalla de login con un mensaje de error
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta ha sido suspendida. Contacta a un administrador.',
            ]);
        }

        return $next($request);
    }
}
