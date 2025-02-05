<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Inertia\Inertia;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Animal;
use Illuminate\Http\Request;


class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with(['animal', 'cliente', 'usuario'])->get();  // Eager loading de las relaciones
        return Inertia::render('Servicios/Index', [
            'servicios' => $servicios,
        ]);
    }

    public function show($id)
    {
        $servicio = Servicio::with(['animal', 'cliente', 'usuario'])->findOrFail($id); // Eager loading de las relaciones
        return Inertia::render('Servicios/Show', [
            'servicio' => $servicio,
        ]);
    }


    public function create()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        $usuarios = Usuario::all(); // Obtener todos los usuarios (empleados que gestionarán los servicios)
        $animales = Animal::all(); // Obtener todos los animales

        return Inertia::render('Servicios/Create', [
            'clientes' => $clientes,
            'usuarios' => $usuarios,
            'animales' => $animales, // Pasar los animales a la vista
        ]);
    }


public function store(Request $request)
{
    $data = $request->validate([
        'tipo'  =>  'required|string|max:255',
        'motivo' => 'required|string|max:255',
        'duracion' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'cliente_id' => 'required|exists:clientes,id',
        'usuario_id' => 'required|exists:usuarios,id',
        'animal_id' => 'required|exists:animales,id',
    ]);

    Servicio::create($data);
    return redirect()->route('servicios.index');
}
public function edit($id)
{
    $servicio = Servicio::findOrFail($id);
    $clientes = Cliente::all(); // Obtener todos los clientes
    $usuarios = Usuario::all(); // Obtener todos los usuarios (veterinarios)
    $animales = Animal::all(); // Obtener todos los animales

    return Inertia::render('Servicios/Edit', [
        'servicio' => $servicio,
        'clientes' => $clientes,
        'usuarios' => $usuarios,
        'animales' => $animales,
    ]);
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'tipo' => 'required|string|max:255',
        'motivo' => 'required|string|max:255',
        'duracion' => 'required|numeric|max:255',
        'precio' => 'required|numeric|min:0',
        'cliente_id' => 'required|exists:clientes,id',
        'usuario_id' => 'required|exists:usuarios,id',
        'animal_id' => 'required|exists:animales,id',
    ]);

    $servicio = Servicio::findOrFail($id);
    $servicio->update($data);
    return redirect()->route('servicios.index');
}

public function destroy($id)
{
    $servicio = Servicio::findOrFail($id); // Encuentra al cliente por ID, o lanza un error 404 si no existe
    $servicio->delete(); // Elimina el cliente

    // Redirige a la lista de clientes con un mensaje de éxito
    return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente');
}

}
