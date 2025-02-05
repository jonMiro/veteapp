<?php
// app/Http/Controllers/AnimalController.php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use App\Models\Usuario;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::with(['cliente', 'usuario'])->get();  // Eager loading de las relaciones
        return Inertia::render('Animales/Index', [
            'animales' => $animales,
        ]);
    }
    public function show($id)
{
    $animal = Animal::with(['cliente', 'usuario'])->findOrFail($id); // Eager loading de las relaciones
    return Inertia::render('Animales/Show', [
        'animal' => $animal,
    ]);
}

    public function create()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        $usuarios = Usuario::all(); // Obtener todos los usuarios (veterinarios)

        return Inertia::render('Animales/Create', [
            'clientes' => $clientes,
            'usuarios' => $usuarios,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        Animal::create($data);
        return redirect()->route('animales.index');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $clientes = Cliente::all(); // Obtener todos los clientes
        $usuarios = Usuario::all(); // Obtener todos los usuarios (veterinarios)

        return Inertia::render('Animales/Edit', [
            'animal' => $animal,
            'clientes' => $clientes,
            'usuarios' => $usuarios,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update($data);
        return redirect()->route('animales.index');
    }
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        // Redirige a la página anterior con un mensaje de éxito
        return redirect()->route('animales.index')->with('success', 'Animal eliminado');
    }
}
