<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Muestra la pantalla de finalización de compra.
     */
    public function index(Request $request)
    {
        // 1. MODO COMPRA RÁPIDA (Estilo Mercado Libre)
        if ($request->has('comprar_ahora')) {
            $productoId = $request->input('comprar_ahora');
            $producto = Producto::find($productoId);

            // Validaciones
            if (!$producto || $producto->activo == 0) {
                return redirect()->back()->with('error', 'Este producto ya no está disponible.');
            }
            if ($producto->stock < 1) {
                return redirect()->back()->with('error', 'El producto "' . $producto->nombre . '" no tiene stock en este momento.');
            }

            // Creamos un ítem temporal "en memoria" (NO se guarda en la base de datos)
            $itemTemporal = new CarritoItem();
            $itemTemporal->producto_id = $producto->id;
            $itemTemporal->cantidad = 1;
            $itemTemporal->setRelation('producto', $producto);

            // Lo convertimos en una colección para que la vista de pago lo lea igual que un carrito
            $carrito = collect([$itemTemporal]);

            return view('compra', compact('carrito'));
        }


        // 2. MODO CARRITO NORMAL
        $carrito = CarritoItem::with('producto')->where('user_id', Auth::id())->get();

        if ($carrito->isEmpty()) {
            return redirect()->to('/')->with('error', 'Tu carrito está vacío.');
        }

        foreach ($carrito as $item) {
            if (!$item->producto || $item->producto->activo == 0) {
                return redirect()->route('carrito.index')->with('error', 'Tu carrito contiene productos que ya no están disponibles. Por favor, eliminalos para continuar.');
            }

            if ($item->producto->stock < $item->cantidad) {
                return redirect()->route('carrito.index')->with('error', 'El producto "' . $item->producto->nombre . '" ya no cuenta con el stock solicitado.');
            }
        }

        return view('compra', compact('carrito'));
    }
}
