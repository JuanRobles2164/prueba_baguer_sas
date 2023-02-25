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
            $table->string('nombres', 100)->nullable();
            $table->string('apellidos', 100)->nullable();
            $table->char('genero', 2)->default('M');
            $table->string('celular', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 40)->unique();
            $table->string('direccion', 40)->nullable();
            $table->string('pais', 100)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('thumbnail', 100)->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
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
