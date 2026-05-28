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
        Schema::table('consultas', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->nullable()->change(); // Lo hace opcional
            $table->string('nombre', 100)->nullable(); // Columna nueva
            $table->string('email', 100)->nullable();  // Columna nueva
        });
    }

    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'email']);
        });
    }
};
