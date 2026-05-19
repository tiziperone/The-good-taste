<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_ordens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('productos_id');
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->unsignedBigInteger('ordens_id');
            $table->foreign('ordens_id')->references('id')->on('ordens')->onDelete('cascade');
            $table->integer('cantidad')->default(1);
            $table->decimal('precioUnitario', 10, 2);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_ordens');
    }
};
