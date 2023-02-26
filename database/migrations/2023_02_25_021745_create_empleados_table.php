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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('genero', 10);
            $table->string('celular', 15);
            $table->string('telefono', 15);
            $table->string('email', 40);
            $table->string('direccion', 40);
            $table->string('pais', 100);
            $table->string('estado', 100);
            $table->string('ciudad', 100);
            $table->string('thumbnail', 100);
            $table->string('usuario');
            $table->string('nacionalidad', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
