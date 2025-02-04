<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'tipo',
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'correo',
        'password'
    ];

    // Relación con animales (puede ser veterinario que atiende animales)
    public function animales()
    {
        return $this->hasMany(Animal::class);
    }
}
