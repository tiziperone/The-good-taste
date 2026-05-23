<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de que el modelo sea el correcto

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Buscamos el producto en la base de datos
        $producto = Producto::find($productoId);

        if (!$producto) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado.'], 404);
        }

        // Validamos si hay stock disponible antes de agregar
        if ($producto->stock <= 0) {
            return response()->json(['success' => false, 'message' => 'Lo sentimos, este producto no tiene stock disponible.'], 400);
        }

        // Obtenemos el carrito actual de la sesión o creamos uno vacío
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, sumamos la cantidad
        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad']++;
        } else {
            // Si es nuevo, lo agregamos con sus detalles básicos
            $carrito[$productoId] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png'
            ];
        }

        // Guardamos el nuevo estado del carrito en la sesión
        session()->put('carrito', $carrito);

        return response()->json([
            'success' => true,
            'message' => '¡Producto agregado al carrito con éxito!',
            'cart_count' => count($carrito) // Útil si querés actualizar un contador en la navbar
        ]);
    }
}
