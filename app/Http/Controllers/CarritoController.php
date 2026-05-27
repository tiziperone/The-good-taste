<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Carga la vista de la tabla leyendo los registros desde la BD
    public function index(Request $request)
    {
        $urlAnterior = url()->previous();

        // Evitamos capturar las URLs del propio carrito o sus acciones internas
        if (!str_contains($urlAnterior, '/carrito')) {
            session()->put('url_seguir_comprando', $urlAnterior);
        }

        // Cargamos el carrito con su relación de producto
        $carrito = CarritoItem::with('producto')->where('user_id', Auth::id())->get();

        return view('carrito', compact('carrito'));
    }

    // Agrega o incrementa un producto usando Eloquent (AJAX Fetch)
    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $producto = Producto::find($productoId);

        if (!$producto) {
            return response()->json(['success' => false, 'message' => 'El producto ya no existe en el catálogo.'], 404);
        }

        if ($producto->stock <= 0) {
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

    // Procesa los botones + y - de la tabla directamente en la BD (AJAX Fetch)
    public function actualizar(Request $request)
    {
        $id = $request->input('id');
        $accion = $request->input('accion');

        $item = CarritoItem::with('producto')->where('user_id', Auth::id())->find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado en tu carrito.'], 404);
        }

        // Si intentan actualizar un ítem cuyo producto ya no existe en la BD física
        if (!$item->producto) {
            return response()->json(['success' => false, 'message' => 'Este producto ya no está disponible en nuestro catálogo.'], 422);
        }

        if ($accion === 'incrementar') {
            if ($item->cantidad >= $item->producto->stock) {
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
                    'message' => 'La cantidad mínima es 1 kg. Si no lo deseás, podés eliminarlo.'
                ], 400);
            }
        }

        // Calculamos los subtotales de forma segura
        $subtotal = $item->producto->precio * $item->cantidad;
        $todoElCarrito = CarritoItem::with('producto')->where('user_id', Auth::id())->get();

        $totalGeneral = 0;
        foreach ($todoElCarrito as $row) {
            if ($row->producto) { // Solo sumamos productos que existan
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
