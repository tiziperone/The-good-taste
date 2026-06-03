<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos de forma inteligente
        $reglas = [
            'asunto'  => 'required|string|max:100',
            'mensaje' => 'required|string',
        ];

        // Si es invitado (no está logueado), le exigimos que complete nombre y correo
        if (!Auth::check()) {
            $reglas['nombre'] = 'required|string|max:255';
            $reglas['email']  = 'required|email|max:255';
        }

        $request->validate($reglas);

        // 2. Determinamos los datos de forma segura
        $nombre = Auth::check() ? Auth::user()->name : $request->nombre;
        $email  = Auth::check() ? Auth::user()->email : $request->email;

        // 3. Guardamos en la base de datos
        Consulta::create([
            'users_id' => Auth::id(), // Devuelve null si no está logueado
            'nombre'   => $nombre,
            'email'    => $email,
            'asunto'   => $request->asunto,
            'mensaje'  => $request->mensaje,
            'estado'   => false,
        ]);

        // 4. Redirigimos a la vista de éxito pasándole las variables que necesita
        // IMPORTANTE: Ahora llama al archivo exito.blade.php
        return view('exito', [
            'nombre' => $nombre,
            'email'  => $email
        ]);
    }
}
