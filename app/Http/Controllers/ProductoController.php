<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    //SECCIÓN BONDIOLAS (Categoría ID 1)

    public function mostrarBondiolas()
    {
        $productos = Producto::where('activo', true)->where('categoria_id', 1)->get();
        $bondiolaClasica = $productos->where('nombre', 'Bondiola Clásica (1kg)')->first();
        $bondiolaPimenton = $productos->where('nombre', 'Bondiola al Pimentón (1kg)')->first();

        return view('bondiola', compact('bondiolaClasica', 'bondiolaPimenton'));
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


    //SECCIÓN MILANESAS (Categoría ID 2 en DBeaver)

    public function mostrarMilanesas()
    {
        // Traemos solo los productos activos que sean milanesas
        $productos = Producto::where('activo', true)->where('categoria_id', 2)->get();

        // Acá podés buscar tus tarjetas específicas de milanesas (ej: de carne, de pollo)
        $milaCarne = $productos->where('nombre', 'Milanesa de Carne (1kg)')->first();
        $milaPollo = $productos->where('nombre', 'Milanesa de Pollo (1kg)')->first();

        return view('milanesas', compact('milaCarne', 'milaPollo')); // Tu vista de milanesas
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


    //SECCIÓN PASTAS (Categoría ID 3 en DBeaver)

    public function mostrarPastas()
    {
        $productos = Producto::where('activo', true)->where('categoria_id', 3)->get();
        $tallarines = $productos->where('nombre', 'Tallarines Caseros (1kg)')->first();
        $ravioles = $productos->where('nombre', 'Ravioles Artesanales (1kg)')->first();

        return view('pastas', compact('tallarines', 'ravioles')); // Tu vista de pastas
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

    //Para no repetir las validaciones

    private function validarProducto(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);
    }

    //(Sirve para cualquier producto de cualquier categoría)
    // Al poner "int", le aclarás a PHP e Intelephense el tipo de dato exacto
    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['activo' => false]);
        return back()->with('success', '¡Producto removido del catálogo exitosamente!');
    }
}
