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
        Schema::create('animales', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->string('nombre');
            $table->string('tipo');
            $table->string('raza');
            $table->string('imagen')->nullable(); // URL o ruta de imagen
            $table->date('fechaNacimiento');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // Relación con clientes
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null'); // Relación con usuarios
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
