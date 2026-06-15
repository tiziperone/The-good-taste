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
            $table->string('estado')->default('En proceso')->change();
            $table->string('metodo_envio')->nullable()->after('estado');
            $table->string('direccion_envio')->nullable()->after('metodo_envio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->dropColumn(['metodo_envio', 'direccion_envio']);

            // Revertimos 'estado' a boolean
            $table->boolean('estado')->default(false)->change();
        });
    }
};
