<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RespuestaConsulta;

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

    //Gestion de productos
    public function productos(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $ordenActivos = $request->query('orden_activos', 'desc');
        $ordenEliminados = $request->query('orden_eliminados', 'desc');

        // Construimos la consulta dependiendo de lo que elija el usuario
        $queryProductos = Producto::query();

        if ($ordenActivos === 'stock_asc') {
            $queryProductos->orderBy('stock', 'asc');
        } elseif ($ordenActivos === 'stock_desc') {
            $queryProductos->orderBy('stock', 'desc');
        } elseif ($ordenActivos === 'asc') {
            $queryProductos->orderBy('created_at', 'asc');
        } else {
            $queryProductos->orderBy('created_at', 'desc'); // Por defecto
        }

        $productos = $queryProductos->get();
        $productosEliminados = Producto::onlyTrashed()->orderBy('deleted_at', $ordenEliminados)->get();

        $consultas = Consulta::all();

        return view('admin-productos', compact('productos', 'productosEliminados', 'ordenActivos', 'ordenEliminados', 'consultas'));
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

    // NUEVO: MÉTODO PARA RESTAURAR PRODUCTOS
    public function restaurar(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // Buscamos el producto solo entre los eliminados
        $producto = Producto::onlyTrashed()->findOrFail($id);

        // restore() quita el deleted_at de la base de datos (DBeaver)
        $producto->restore();

        // Nos aseguramos de que su estado "activo" vuelva a true por las dudas
        $producto->update(['activo' => true]);

        return back()->with('success', 'Producto reactivado correctamente. ¡Vuelve a estar en el catálogo!');
    }
}
