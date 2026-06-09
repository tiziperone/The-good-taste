<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ordens', function (Blueprint $table) {

            //decimos que 'estado' deje de ser un número y pase a ser texto.
            $table->string('estado')->default('En proceso')->change();
        });
    }

    public function down(): void
    {
        Schema::table('ordens', function (Blueprint $table) {

            $table->boolean('estado')->default(false)->change();
        });
    }
};
