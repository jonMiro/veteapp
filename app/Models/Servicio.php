<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'tipo', 'motivo', 'animal_id', 'cliente_id', 'usuario_id', 'precio', 'duracion',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class); // Relación inversa: un servicio es para un animal
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); // Relación inversa: un servicio es para un cliente
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class); // Relación inversa: un servicio es realizado por un usuario
    }
}
