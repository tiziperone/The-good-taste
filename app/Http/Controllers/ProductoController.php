<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    //bondiolas
    public function mostrarBondiolas()
    {
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


    //milanesas
    public function mostrarMilanesas()
    {
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


    //pastas
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

    private function validarProducto(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);
    }

    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return back()->with('success', '¡Producto removido del catálogo exitosamente!');
    }
}
