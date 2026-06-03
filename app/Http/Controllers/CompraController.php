<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\CarritoItem; // Importamos el modelo correcto
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();

        // Obtenemos el carrito usando CarritoItem y la columna user_id
        $carrito = CarritoItem::where('user_id', $usuario->id)->get();

        // Obtenemos las direcciones guardadas (esta tabla sí usa id_usuario)
        $direccionesGuardadas = Direccion::where('id_usuario', $usuario->id)->get();

        return view('compra', compact('carrito', 'direccionesGuardadas'));
    }

    public function guardarDireccionOpcional(Request $request)
    {
        $request->validate([
            'calle' => 'required|string|max:255',
            'altura' => 'required|string|max:255',
            'piso_depto' => 'nullable|string|max:255',
            'nombre_direccion' => 'nullable|string|max:255',
        ]);

        // Si el checkbox de guardar está marcado
        if ($request->has('guardar_futura')) {
            Direccion::create([
                'id_usuario' => Auth::id(),
                'nombre' => $request->input('nombre_direccion') ?? 'Mi Dirección',
                'calle' => $request->input('calle'),
                'altura' => $request->input('altura'),
                'piso_depto' => $request->input('piso_depto'),
            ]);
        }

        // Aquí continuaría tu lógica normal para procesar la orden de compra en la BD...
        return response()->json(['success' => true]);
    }
}
