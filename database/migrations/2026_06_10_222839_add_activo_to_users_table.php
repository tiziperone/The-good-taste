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
        Schema::table('users', function (Blueprint $table) {
            // Agregamos la columna 'activo', por defecto en true (1)
            $table->boolean('activo')->default(true)->after('email'); // Puedes cambiar 'after' a donde prefieras
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminamos la columna por si necesitamos revertir la migración
            $table->dropColumn('activo');
        });
    }
};
