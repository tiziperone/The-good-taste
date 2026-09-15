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
    // Función auxiliar privada para cargar solo lo necesario para el contador de la barra lateral
    private function getConsultasNoLeidas()
    {
        // Solo trae el id y estado de los mensajes nuevos, ahorrando muchísima memoria RAM
        return Consulta::select('id', 'estado')->where('estado', 0)->get();
    }

    public function index()
    {
        // Para el dashboard principal, si necesitas verlas todas, lo ideal es paginar.
        $consultas = Consulta::orderBy('created_at', 'desc')->paginate(10);
        return view('admin', compact('consultas'));
    }

    public function productos(Request $request)
    {
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

        // Paginamos separando los nombres de las páginas para que no choquen entre sí
        $productos = $queryProductos->paginate(15, ['*'], 'page_activos')->appends(request()->query());
        $productosEliminados = Producto::onlyTrashed()->orderBy('deleted_at', $ordenEliminados)->paginate(15, ['*'], 'page_eliminados')->appends(request()->query());

        $consultas = $this->getConsultasNoLeidas();

        return view('admin-productos', compact('productos', 'productosEliminados', 'ordenActivos', 'ordenEliminados', 'consultas'));
    }

    public function pedidos()
    {
        // OPTIMIZACIÓN: Solo traemos de a 15 pedidos por página para no saturar TiDB y Render
        $pedidos = Orden::with('user')->orderBy('created_at', 'desc')->paginate(15);
        $consultas = $this->getConsultasNoLeidas();

        $pedidosIds = $pedidos->pluck('id');

        // Solo hacemos el JOIN si hay pedidos en esta página
        if ($pedidosIds->isNotEmpty()) {
            $todosLosDetalles = DB::table('item_ordens')
                ->join('productos', 'item_ordens.productos_id', '=', 'productos.id')
                ->whereIn('item_ordens.ordens_id', $pedidosIds)
                ->whereNull('item_ordens.deleted_at')
                ->select('item_ordens.*', 'productos.nombre')
                ->get()
                ->groupBy('ordens_id');

            foreach ($pedidos as $pedido) {
                $pedido->detalles = $todosLosDetalles->get($pedido->id, collect());
            }
        } else {
            foreach ($pedidos as $pedido) {
                $pedido->detalles = collect();
            }
        }

        return view('admin-pedidos', compact('pedidos', 'consultas'));
    }

    public function actualizarEstadoPedido(Request $request, int $id)
    {
        $request->validate(['estado' => 'required|string']);
        $pedido = Orden::findOrFail($id);
        $estadoNuevo = $request->estado === '0' ? 'En proceso' : $request->estado;
        $estadosPermitidos = ['En proceso', 'Listo para enviar/retirar', 'Enviado', 'Entregado/retirado'];

        if (in_array($estadoNuevo, $estadosPermitidos)) {
            $pedido->update(['estado' => $estadoNuevo]);
            return back()->with('success', 'El estado del pedido #' . $pedido->id . ' se ha actualizado a: ' . $estadoNuevo);
        }

        return back()->with('error', 'Estado no válido.');
    }

    public function consultas()
    {
        // Paginamos las consultas para que la página de lectura no explote si hay miles
        $consultas = Consulta::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin-consultas', compact('consultas'));
    }

    public function store(Request $request)
    {
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
        $consulta = Consulta::findOrFail($id);
        $consulta->estado = !$consulta->estado;
        $consulta->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    public function responder(Request $request, int $id)
    {
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
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return back()->with('success', 'Consulta eliminada correctamente.');
    }

    public function restaurar(int $id)
    {
        $producto = Producto::onlyTrashed()->findOrFail($id);
        $producto->restore();

        $producto->activo = true;
        $producto->created_at = now();
        $producto->save();

        return back()->with('success', 'Producto reactivado correctamente. ¡Vuelve a estar en el catálogo!');
    }

    public function verUsuarios()
    {
        // Administradores suelen ser pocos, está bien traerlos todos
        $administradores = User::whereIn('role', ['admin', 'gerente'])->get();

        // Los clientes pueden ser miles, paginamos de a 20
        $usuarios = User::whereNotIn('role', ['admin', 'gerente'])->orWhereNull('role')->paginate(20);

        $consultas = $this->getConsultasNoLeidas();

        return view('admin-usuarios', compact('administradores', 'usuarios', 'consultas'));
    }

    public function hacerAdmin(int $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->role = 'admin';
        $usuario->save();

        return back()->with('success', "El usuario {$usuario->name} ahora es administrador.");
    }

    public function quitarAdmin(int $id)
    {
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
        $usuario = User::findOrFail($id);

        if ($usuario->id === Auth::id()) {
            return back()->with('error', 'No puedes banearte a ti mismo.');
        }

        $usuario->activo = !$usuario->activo;
        $usuario->save();

        $estado = $usuario->activo ? 'reactivado' : 'baneado';
        return back()->with('success', "Usuario {$usuario->name} ha sido {$estado} correctamente.");
    }

    public function hacerGerente(int $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->role = 'gerente';
        $usuario->save();

        return back()->with('success', "El usuario {$usuario->name} ahora es gerente.");
    }

    public function eliminarPedido($id)
    {
        $pedido = \App\Models\Orden::find($id);

        if (!$pedido) {
            return redirect()->back()->with('error', 'El pedido no existe o ya fue eliminado.');
        }

        $pedido->delete();

        return redirect()->route('admin.pedidos')->with('success', 'Pedido #' . $id . ' eliminado exitosamente.');
    }
}
