<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos que el mensaje y el asunto existan
        $request->validate([
            'asunto'  => 'required|string|max:100',
            'mensaje' => 'required|string',
        ]);

        // 2. Guardamos en la base de datos
        // Si está logueado, usamos su ID y datos. Si no, usamos lo que envió en el form.
        Consulta::create([
            'users_id' => Auth::id(), // Devuelve null si no está logueado
            'nombre'   => Auth::check() ? Auth::user()->name : $request->nombre,
            'email'    => Auth::check() ? Auth::user()->email : $request->email,
            'asunto'   => $request->asunto,
            'mensaje'  => $request->mensaje,
            'estado'   => false,
        ]);

        // 3. Redirigimos al usuario con un mensaje de éxito
        return back()->with('success', '¡Gracias por tu mensaje! Nos pondremos en contacto pronto.');
    }
}
