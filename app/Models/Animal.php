<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = [
        'nombre',
        'tipo',
        'raza',
        'imagen',
        'fechaNacimiento',
        'cliente_id',
        'usuario_id'
    ];

    // Relación con el cliente dueño del animal
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con el usuario (veterinario que lo atiende)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    
}
