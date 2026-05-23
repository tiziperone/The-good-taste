<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $producto = Producto::find($productoId);

        if (!$producto) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado.'], 404);
        }

        if ($producto->stock <= 0) {
            return response()->json(['success' => false, 'message' => 'Lo sentimos, este producto no tiene stock disponible.'], 400);
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad']++;
        } else {
            $carrito[$productoId] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png'
            ];
        }

        session()->put('carrito', $carrito);

        return response()->json([
            'success' => true,
            'message' => '¡Producto agregado al carrito con éxito!',
            'cart_count' => count($carrito)
        ]);
    }

    public function actualizar(Request $request)
    {
        $id = $request->input('id');
        $accion = $request->input('accion'); // 'incrementar' o 'decrementar'

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $producto = Producto::find($id);

            if ($accion === 'incrementar') {
                // Validación estricta de stock en Base de Datos
                if ($producto && $carrito[$id]['cantidad'] >= $producto->stock) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No hay más stock disponible de este producto.'
                    ], 400);
                }
                $carrito[$id]['cantidad']++;
            } elseif ($accion === 'decrementar') {
                if ($carrito[$id]['cantidad'] > 1) {
                    $carrito[$id]['cantidad']--;
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'La cantidad mínima es 1 kg. Si no lo deseás, podés eliminarlo.'
                    ], 400);
                }
            }

            session()->put('carrito', $carrito);

            // Cálculos dinámicos para retornar
            $subtotal = $carrito[$id]['precio'] * $carrito[$id]['cantidad'];
            $totalGeneral = 0;
            foreach ($carrito as $item) {
                $totalGeneral += $item['precio'] * $item['cantidad'];
            }

            return response()->json([
                'success' => true,
                'cantidad' => $carrito[$id]['cantidad'],
                'subtotal' => '$ ' . number_format($subtotal, 0, ',', '.'),
                'totalGeneral' => '$ ' . number_format($totalGeneral, 0, ',', '.')
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Producto no encontrado.'], 404);
    }

    public function eliminar(int $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto removido del carrito.');
    }

    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->back()->with('success', 'El carrito se vació correctamente.');
    }
}
