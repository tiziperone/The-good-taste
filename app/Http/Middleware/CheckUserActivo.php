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
        if (Auth::check() && !Auth::user()->activo) {

            // Cerramos sesión
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Va a pantalla de login con un mensaje de error
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta ha sido suspendida. Contacta a un administrador.',
            ]);
        }

        return $next($request);
    }
}
