<?php

// app/Http/Controllers/AnimalController.php
namespace App\Http\Controllers;

use App\Models\Animal;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Método para mostrar el listado de animales
    public function index()
    {
        $animales = Animal::with(['cliente', 'usuario'])->get();  // Eager loading de las relaciones

        return Inertia::render('Animales/Index', [
            'animales' => $animales,
        ]);
    }

        // Obtener un animal por ID y renderizar la vista
        public function show($id)
        {
            $animal = Animal::with(['cliente', 'usuario'])->find($id);
            if (!$animal) {
                return response()->json(['message' => 'Animal no encontrado'], 404);
            }

            return Inertia::render('Animales/Show', [
                'animal' => $animal,
            ]);
        }
    }
