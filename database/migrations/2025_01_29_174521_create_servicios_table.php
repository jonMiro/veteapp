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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->string('tipo'); // Peluquería, cita, revisión, urgencia, etc.
            $table->text('motivo');
            $table->foreignId('animal_id')->nullable()->constrained('animales')->onDelete('set null'); // Relación con animales, set null al eliminar el animal
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null'); // Relación con clientes, set null al eliminar el cliente
            $table->unsignedBigInteger('usuario_id')->nullable(); // Definir como unsignedBigInteger
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null'); // Relación con usuarios, set null al eliminar el usuario
            $table->decimal('precio', 8, 2); // Precio del servicio
            $table->integer('duracion'); // Duración en minutos del servicio
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
