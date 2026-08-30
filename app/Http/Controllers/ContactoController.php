<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        $reglas = [
            'asunto'  => 'required|string|max:100',
            'mensaje' => 'required|string',
        ];

        $mensajes = [
            'email.email' => 'Por favor, ingresa un correo electrónico real con un dominio válido.',
        ];

        // Si es invitado, le exigimos nombre y validamos que su dominio de correo sea real
        if (!Auth::check()) {
            $reglas['nombre'] = 'required|string|max:255';
            $reglas['email']  = 'required|email:rfc,dns|max:255';
        }

        $request->validate($reglas, $mensajes);

        $nombre = Auth::check() ? Auth::user()->name : $request->nombre;
        $email  = Auth::check() ? Auth::user()->email : $request->email;

        Consulta::create([
            'users_id' => Auth::id(),
            'nombre'   => $nombre,
            'email'    => $email,
            'asunto'   => $request->asunto,
            'mensaje'  => $request->mensaje,
            'estado'   => false,
        ]);

        return view('exito', [
            'nombre' => $nombre,
            'email'  => $email
        ]);
    }
}
