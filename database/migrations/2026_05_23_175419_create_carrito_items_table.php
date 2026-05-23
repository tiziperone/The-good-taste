<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carrito_items', function (Blueprint $table) {
            $table->id();
            // Relación con el usuario logueado
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Relación con tus productos (asumo que tu tabla se llama 'productos' en DBeaver)
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            // Cantidad o kilos del producto
            $table->integer('cantidad')->default(1);
            $table->timestamps();
        });
    }
};
