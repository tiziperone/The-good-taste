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
    public function index(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $ordenActivos = $request->query('orden_activos', 'desc');
        $ordenEliminados = $request->query('orden_eliminados', 'desc');

        $productos = Producto::orderBy('created_at', $ordenActivos)->get();
        $productosEliminados = Producto::onlyTrashed()->orderBy('deleted_at', $ordenEliminados)->get();

        return view('admin', compact('productos', 'productosEliminados', 'ordenActivos', 'ordenEliminados'));
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

        // Automatizamos el campo 'tipo' según la categoría elegida
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
            'activo' => true // ¡AQUÍ ESTÁ LA MAGIA! Lo activamos por defecto
        ]);

        return redirect()->route('admin.index')->with('success', 'Producto agregado correctamente al catálogo.');
    }

    // MÉTODO PARA EDITAR PRODUCTOS
    public function update(Request $request, $id)
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

        // Volvemos a automatizar el tipo por si le cambiaste la categoría
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
            'activo' => true // Aseguramos que siga activo al editarse
        ]);

        return redirect()->route('admin.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function marcarLeido(int $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        $consulta = Consulta::findOrFail($id);
        // Cambiamos el estado: si era 0 pasa a 1, si era 1 pasa a 0
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

        // 1. Guardar la respuesta en la BD
        $consulta->update([
            'respuesta' => $request->respuesta,
            'estado' => true // Marcamos como leído automáticamente al responder
        ]);

        // 2. Enviar el correo usando tu configuración SMTP
        Mail::to($consulta->email)->send(new RespuestaConsulta($consulta, $request->respuesta));

        return back()->with('success', 'Respuesta enviada y registrada correctamente.');
    }
}
