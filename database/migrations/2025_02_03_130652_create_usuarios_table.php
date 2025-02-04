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
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); // ID autoincrementable
        $table->string('tipo'); // Veterinario, auxiliar, administrativo
        $table->string('nombre');
        $table->string('apellidos');
        $table->string('direccion');
        $table->string('telefono');
        $table->string('correo')->unique(); // Correo único
        $table->string('password'); // Contraseña de usuario
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
