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
        Schema::table('ordens', function (Blueprint $table) {
            // Cambiar 'estado' de boolean a string con valor por defecto
            $table->string('estado')->default('Sin confirmar')->change();

            // Agregar los nuevos campos sin borrar los datos existentes
            $table->string('forma_pago')->nullable()->after('estado');
            $table->string('metodo_envio')->nullable()->after('forma_pago');
            $table->string('direccion_envio')->nullable()->after('metodo_envio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->boolean('estado')->default(false)->change();
            $table->dropColumn(['forma_pago', 'metodo_envio', 'direccion_envio']);
        });
    }
};
