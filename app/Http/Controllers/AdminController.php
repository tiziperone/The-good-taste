<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Consulta;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RespuestaConsulta;
use App\Models\User;

class AdminController extends Controller
{
    //Admin principal
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $consultas = Consulta::all();

        return view('admin', compact('consultas'));
    }

    public function productos(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $ordenActivos = $request->query('orden_activos', 'desc');
        $ordenEliminados = $request->query('orden_eliminados', 'desc');

        $queryProductos = Producto::query();

        if ($ordenActivos === 'stock_asc') {
            $queryProductos->orderBy('stock', 'asc');
        } elseif ($ordenActivos === 'stock_desc') {
            $queryProductos->orderBy('stock', 'desc');
        } elseif ($ordenActivos === 'asc') {
            $queryProductos->orderBy('created_at', 'asc');
        } else {
            $queryProductos->orderBy('created_at', 'desc');
        }

        $productos = $queryProductos->get();
        $productosEliminados = Producto::onlyTrashed()->orderBy('deleted_at', $ordenEliminados)->get();

        $consultas = Consulta::all();

        return view('admin-productos', compact('productos', 'productosEliminados', 'ordenActivos', 'ordenEliminados', 'consultas'));
    }

    public function pedidos()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $pedidos = Orden::with('user')->orderBy('created_at', 'desc')->get();

        // Le adjuntamos a cada pedido sus productos asociados para que la vista los muestre
        foreach ($pedidos as $pedido) {
            $pedido->detalles = DB::table('item_ordens')
                ->join('productos', 'item_ordens.productos_id', '=', 'productos.id')
                ->where('item_ordens.ordens_id', $pedido->id)
                ->whereNull('item_ordens.deleted_at')
                ->select('item_ordens.*', 'productos.nombre')
                ->get();
        }

        $consultas = Consulta::all();

        return view('admin-pedidos', compact('pedidos', 'consultas'));
    }

    public function actualizarEstadoPedido(Request $request, int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $request->validate([
            'estado' => 'required|string'
        ]);

        $pedido = Orden::findOrFail($id);

        $estadoNuevo = $request->estado === '0' ? 'En proceso' : $request->estado;

        // La nueva lista de estados permitidos generalizados
        $estadosPermitidos = ['En proceso', 'Listo para enviar/retirar', 'Enviado', 'Entregado/retirado'];

        if (in_array($estadoNuevo, $estadosPermitidos)) {
            $pedido->update(['estado' => $estadoNuevo]);
            return back()->with('success', 'El estado del pedido #' . $pedido->id . ' se ha actualizado a: ' . $estadoNuevo);
        }

        return back()->with('error', 'Estado no válido.');
    }

    public function consultas()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('admin-consultas', compact('consultas'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'categoria_id' => 'required|integer'
        ]);

        $tipo = 'Otra';
        if ($request->categoria_id == 1) $tipo = 'Bondiola';
        elseif ($request->categoria_id == 2) $tipo = 'Milanesa';
        elseif ($request->categoria_id == 3) $tipo = 'Pasta';

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'url_imagen' => $request->url_imagen,
            'categoria_id' => $request->categoria_id,
            'tipo' => $tipo,
            'activo' => true
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto agregado correctamente al catálogo.');
    }

    public function update(Request $request, int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'categoria_id' => 'required|integer'
        ]);

        $producto = Producto::findOrFail($id);

        $tipo = 'Otra';
        if ($request->categoria_id == 1) $tipo = 'Bondiola';
        elseif ($request->categoria_id == 2) $tipo = 'Milanesa';
        elseif ($request->categoria_id == 3) $tipo = 'Pasta';

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'url_imagen' => $request->url_imagen,
            'categoria_id' => $request->categoria_id,
            'tipo' => $tipo,
            'activo' => true
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function marcarLeido(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $consulta = Consulta::findOrFail($id);
        $consulta->estado = !$consulta->estado;
        $consulta->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    public function responder(Request $request, int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $request->validate(['respuesta' => 'required|string']);

        $consulta = Consulta::findOrFail($id);

        $consulta->update([
            'respuesta' => $request->respuesta,
            'estado' => true
        ]);

        Mail::to($consulta->email)->send(new RespuestaConsulta($consulta, $request->respuesta));

        return back()->with('success', 'Respuesta enviada y registrada correctamente.');
    }

    public function eliminar(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return back()->with('success', 'Consulta eliminada correctamente.');
    }

    public function restaurar(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $producto = Producto::onlyTrashed()->findOrFail($id);
        $producto->restore(); // Esto le quita el deleted_at


        $producto->activo = true;
        $producto->created_at = now();
        $producto->save();

        return back()->with('success', 'Producto reactivado correctamente. ¡Vuelve a estar en el catálogo!');
    }


    public function verUsuarios()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // Separamos a los administradores de los usuarios regulares basados en el campo 'role'
        $administradores = User::where('role', 'admin')->get();
        $usuarios = User::where('role', '!=', 'admin')->orWhereNull('role')->get();

        $consultas = Consulta::all();

        return view('admin-usuarios', compact('administradores', 'usuarios', 'consultas'));
    }

    public function hacerAdmin(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $usuario = User::findOrFail($id);

        $usuario->role = 'admin';
        $usuario->save();

        return back()->with('success', "El usuario {$usuario->name} ahora es administrador.");
    }

    public function quitarAdmin(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $usuario = User::findOrFail($id);


        if ($usuario->id === Auth::id()) {
            return back()->with('error', 'No puedes quitarte tus propios permisos de administrador.');
        }

        $usuario->role = 'user';
        $usuario->save();

        return back()->with('success', "Se han quitado los permisos de administrador a {$usuario->name}.");
    }

    public function banear(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $usuario = User::findOrFail($id);

        // Para que el admin no se auto baneé 
        if ($usuario->id === Auth::id()) {
            return back()->with('error', 'No puedes banearte a ti mismo.');
        }

        $usuario->activo = !$usuario->activo;
        $usuario->save();

        $estado = $usuario->activo ? 'reactivado' : 'baneado';
        return back()->with('success', "Usuario {$usuario->name} ha sido {$estado} correctamente.");
    }
}
