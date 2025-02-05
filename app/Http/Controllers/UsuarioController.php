<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();

        return Inertia::render('Usuarios/Index', [
            'usuarios' => $usuarios,
        ]);
    }

    // Método para mostrar un solo usuario
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return Inertia::render('Usuarios/Show', [
            'usuario' => $usuario,
        ]);
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return Inertia::render('Usuarios/Create');
    }

    // Mostrar formulario para editar un usuario existente
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return Inertia::render('Usuarios/Edit', [
            'usuario' => $usuario,
        ]);
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        $data =$request->validate([
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|',
            'password' => 'required|string|min:1',
        ]);

        Usuario::create($data);
        return redirect()->route('usuarios.index');
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|',
            'password' => 'nullable|string|min:1',
        ]);
        $usuario = Usuario::findOrFail($id);
        $usuario->update($data);
        return redirect()->route('usuarios.index');

}
public function destroy($id)
{
    $usuario = Usuario::findOrFail($id); // Encuentra al cliente por ID, o lanza un error 404 si no existe
    $usuario->delete(); // Elimina el cliente

    // Redirige a la lista de clientes con un mensaje de éxito
    return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
}
}
