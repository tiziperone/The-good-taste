<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index(Request $request)
    {
        $urlAnterior = secure_url()->previous();

        if (!str_contains($urlAnterior, '/carrito')) {
            session()->put('url_seguir_comprando', $urlAnterior);
        }

        // Cargamos los ítems del usuario
        $carritoItems = CarritoItem::with('producto')->where('user_id', Auth::id())->get();
        $huboLimpieza = false;

        foreach ($carritoItems as $item) {
            $debeEliminarse = false;

            if (!$item->producto) {
                $debeEliminarse = true;
            } elseif (method_exists($item->producto, 'trashed') && $item->producto->trashed()) {
                $debeEliminarse = true;
            } elseif (isset($item->producto->activo) && $item->producto->activo != 1) {
                $debeEliminarse = true;
            } elseif (isset($item->producto->stock) && $item->producto->stock <= 0) {
                $debeEliminarse = true;
            }

            if ($debeEliminarse) {
                $item->delete();
                $huboLimpieza = true;
            }
        }

        if ($huboLimpieza) {
            return redirect()->route('carrito.index')
                ->with('error', 'Se actualizaron los productos de tu carrito porque algunos ya no se encuentran disponibles en el catálogo.');
        }

        $carrito = $carritoItems;

        return view('carrito', compact('carrito'));
    }

    // Agrega o incrementa un producto
    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $producto = Producto::find($productoId);

        // Validacion por si el produicto fue eliminado mientras el cliente estaba navegando o si no existe
        if (!$producto || (method_exists($producto, 'trashed') && $producto->trashed()) || (isset($producto->activo) && $producto->activo != 1)) {
            return response()->json(['success' => false, 'message' => 'El producto ya no existe en el catálogo.'], 404);
        }

        if (isset($producto->stock) && $producto->stock <= 0) {
            return response()->json(['success' => false, 'message' => 'Lo sentimos, este producto no tiene stock disponible.'], 400);
        }

        $item = CarritoItem::where('user_id', Auth::id())
            ->where('producto_id', $productoId)
            ->first();

        if ($item) {
            $item->increment('cantidad');
        } else {
            CarritoItem::create([
                'user_id' => Auth::id(),
                'producto_id' => $productoId,
                'cantidad' => 1
            ]);
        }

        $conteoUnico = CarritoItem::where('user_id', Auth::id())->count();

        return response()->json([
            'success' => true,
            'message' => '¡Producto agregado al carrito con éxito!',
            'cart_count' => $conteoUnico
        ]);
    }

    // Procesa los botones + y - de la tabla directamente en la BD 
    public function actualizar(Request $request)
    {
        $id = $request->input('id');
        $accion = $request->input('accion');

        $item = CarritoItem::with('producto')->where('user_id', Auth::id())->find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado en tu carrito.'], 404);
        }

        // Validación de seguridad por si eliminaron el producto mientras el cliente estaba en el carrito
        if (!$item->producto || (method_exists($item->producto, 'trashed') && $item->producto->trashed()) || (isset($item->producto->activo) && $item->producto->activo != 1)) {
            return response()->json(['success' => false, 'message' => 'Este producto fue retirado de nuestro catálogo. Refrescá la página.'], 422);
        }

        if ($accion === 'incrementar') {
            if (isset($item->producto->stock) && $item->cantidad >= $item->producto->stock) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay más stock disponible de este producto.'
                ], 400);
            }
            $item->increment('cantidad');
        } elseif ($accion === 'decrementar') {
            if ($item->cantidad > 1) {
                $item->decrement('cantidad');
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'La cantidad mínima es 1 kg. Si no lo deseás, podés eliminarlo usando el botón rojo.'
                ], 400);
            }
        }

        $subtotal = $item->producto->precio * $item->cantidad;
        $todoElCarrito = CarritoItem::with('producto')->where('user_id', Auth::id())->get();

        $totalGeneral = 0;
        foreach ($todoElCarrito as $row) {
            if ($row->producto) {
                $totalGeneral += $row->producto->precio * $row->cantidad;
            }
        }

        return response()->json([
            'success' => true,
            'amount' => $item->cantidad,
            'cantidad' => $item->cantidad,
            'subtotal' => '$ ' . number_format($subtotal, 0, ',', '.'),
            'totalGeneral' => '$ ' . number_format($totalGeneral, 0, ',', '.')
        ]);
    }

    // Remueve un registro físico por id
    public function eliminar(int $id)
    {
        CarritoItem::where('user_id', Auth::id())->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Producto removido del carrito.');
    }

    // Limpia todas las filas del usuario en la BD
    public function vaciar()
    {
        CarritoItem::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'El carrito se vació correctamente.');
    }
}
