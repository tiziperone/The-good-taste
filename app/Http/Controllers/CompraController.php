<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();

        if ($request->has('producto_id')) {
            $producto = Producto::find($request->producto_id);

            // Redirige al inicio (/) si el producto ya no existe, solucionando el error 404
            if (!$producto) {
                return redirect('/')->with('error', 'El producto seleccionado fue retirado del catálogo o ya no está disponible.');
            }

            $cantidad = $request->input('cantidad', 1);

            $item = new CarritoItem([
                'user_id' => $usuario->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad
            ]);

            $item->setRelation('producto', $producto);
            $carrito = collect([$item]);
        } else {
            $carrito = CarritoItem::with('producto')->where('user_id', $usuario->id)->get();
        }

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

        if ($request->has('guardar_futura')) {
            Direccion::create([
                'id_usuario' => Auth::id(),
                'nombre' => $request->input('nombre_direccion') ?? 'Mi Dirección',
                'calle' => $request->input('calle'),
                'altura' => $request->input('altura'),
                'piso_depto' => $request->input('piso_depto'),
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function confirmarCompra(Request $request)
    {
        $usuario = Auth::user();
        $esCarrito = $request->input('es_carrito');
        $itemsRequest = collect($request->input('items', []))->keyBy('producto_id');
        $items = [];
        $totalGeneral = 0;

        if (!$esCarrito && $request->has('producto_id')) {
            $producto = Producto::find($request->input('producto_id'));

            if (!$producto) {
                return response()->json(['success' => false, 'message' => 'El producto seleccionado ya no existe o fue retirado del catálogo.'], 400);
            }

            $cantidad = 1;
            if ($itemsRequest->has($producto->id)) {
                $cantidad = $itemsRequest->get($producto->id)['cantidad'];
            }

            if ($producto->stock < $cantidad) {
                return response()->json(['success' => false, 'message' => 'No hay stock suficiente para: ' . $producto->nombre], 400);
            }

            $totalGeneral = $producto->precio * $cantidad;
            $items[] = (object)[
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio' => $producto->precio
            ];
        } else {
            $carritoBD = CarritoItem::with('producto')->where('user_id', $usuario->id)->get();
            if ($carritoBD->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'Tu carrito está vacío.'], 400);
            }
            foreach ($carritoBD as $c) {
                if (!$c->producto) {
                    return response()->json(['success' => false, 'message' => 'Uno de los productos en tu carrito ya no está disponible.'], 400);
                }

                $cantidad = $c->cantidad;
                if ($itemsRequest->has($c->producto_id)) {
                    $cantidad = $itemsRequest->get($c->producto_id)['cantidad'];
                }

                if ($c->producto->stock < $cantidad) {
                    return response()->json(['success' => false, 'message' => 'No hay stock suficiente para: ' . $c->producto->nombre], 400);
                }
                $totalGeneral += $c->producto->precio * $cantidad;
                $items[] = (object)[
                    'producto_id' => $c->producto_id,
                    'cantidad' => $cantidad,
                    'precio' => $c->producto->precio
                ];
            }
        }

        DB::beginTransaction();

        try {
            $idOrden = DB::table('ordens')->insertGetId([
                'users_id' => $usuario->id,
                'total' => $totalGeneral,
                'estado' => 'En proceso',
                'metodo_envio' => $request->input('metodo_envio', 'retiro'),
                'direccion_envio' => $request->input('direccion_envio', null),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            foreach ($items as $item) {
                DB::table('item_ordens')->insert([
                    'ordens_id' => $idOrden,
                    'productos_id' => $item->producto_id,
                    'cantidad' => $item->cantidad,
                    'precioUnitario' => $item->precio,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                Producto::where('id', $item->producto_id)->decrement('stock', $item->cantidad);
            }

            if ($esCarrito) {
                CarritoItem::where('user_id', $usuario->id)->delete();
            }

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Ocurrió un error procesando el pedido. Intentalo de nuevo.'], 500);
        }
    }
}
