<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'direccion'
    ];

    // Relación con animales (cada cliente puede tener varios animales)
    public function animales()
    {
        return $this->hasMany(Animal::class);
    }
}
