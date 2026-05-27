<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Muestra la pantalla de finalización de compra, validando primero el carrito.
     */
    public function index()
    {
        // 1. Buscamos los productos del carrito del usuario activo con su relación
        $carrito = CarritoItem::with('producto')->where('user_id', Auth::id())->get();

        // 2. Si el carrito está completamente vacío, lo mandamos al inicio
        if ($carrito->isEmpty()) {
            return redirect()->to('/')->with('error', 'Tu carrito está vacío.');
        }

        // 3. VALIDACIÓN DE SEGURIDAD: Recorremos ítem por ítem
        foreach ($carrito as $item) {
            // ¿El producto fue eliminado físicamente de la base de datos?
            if (!$item->producto) {
                return redirect()->to('/carrito')->with('error', 'Tu carrito contiene productos que ya no están disponibles. Por favor, eliminalos para continuar.');
            }

            // ¿Se quedó sin stock a último momento?
            if ($item->producto->stock < $item->cantidad) {
                return redirect()->to('/carrito')->with('error', 'El producto "' . $item->producto->nombre . '" ya no cuenta con el stock solicitado.');
            }
        }

        // 4. AQUÍ ESTABA EL DETALLE: Enviamos la variable $carrito de manera explícita a la vista
        return view('compra', compact('carrito'));
    }
}
