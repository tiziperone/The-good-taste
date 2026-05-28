<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    // SECCIÓN BONDIOLAS (Categoría 1)
    public function mostrarBondiolas()
    {
        // Trae TODAS las bondiolas activas, sin importar su nombre
        $bondiolas = Producto::where('activo', true)->where('categoria_id', 1)->get();
        return view('bondiola', compact('bondiolas'));
    }

    public function storeBondiola(Request $request)
    {
        $this->validarProducto($request);
        Producto::create([
            'nombre'       => $request->nombre,
            'descripcion'  => $request->descripcion,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'tipo'         => 'Bondiola',
            'url_imagen'   => $request->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png',
            'categoria_id' => 1,
            'activo'       => true,
        ]);
        return back()->with('success', '¡Bondiola añadida exitosamente!');
    }


    // SECCIÓN MILANESAS (Categoría 2)
    public function mostrarMilanesas()
    {
        // Trae TODAS las milanesas activas, sin importar su nombre
        $milanesas = Producto::where('activo', true)->where('categoria_id', 2)->get();
        return view('milanesas', compact('milanesas'));
    }

    public function storeMilanesa(Request $request)
    {
        $this->validarProducto($request);
        Producto::create([
            'nombre'       => $request->nombre,
            'descripcion'  => $request->descripcion,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'tipo'         => 'Milanesa',
            'url_imagen'   => $request->url_imagen ?? 'Img/MilaTarjetaCarne.png',
            'categoria_id' => 2,
            'activo'       => true,
        ]);
        return back()->with('success', '¡Milanesa añadida exitosamente!');
    }


    // SECCIÓN PASTAS (Categoría 3)
    public function mostrarPastas()
    {
        $pastas = Producto::where('activo', true)->where('categoria_id', 3)->get();
        return view('pastas', compact('pastas'));
    }

    public function storePasta(Request $request)
    {
        $this->validarProducto($request);
        Producto::create([
            'nombre'       => $request->nombre,
            'descripcion'  => $request->descripcion,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'tipo'         => 'Pasta',
            'url_imagen'   => $request->url_imagen ?? 'Img/PastasTarjeta.png',
            'categoria_id' => 3,
            'activo'       => true,
        ]);
        return back()->with('success', '¡Pasta añadida exitosamente!');
    }

    // Validación unificada
    private function validarProducto(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);
    }

    // Borrado Lógico
    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);

        // Esto activa el SoftDelete y guarda la fecha en 'deleted_at'
        $producto->delete();

        return back()->with('success', '¡Producto removido del catálogo exitosamente!');
    }
}
