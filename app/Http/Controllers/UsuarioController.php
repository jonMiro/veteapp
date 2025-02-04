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
        // Obtenemos todos los usuarios
        $usuarios = Usuario::all();

        // Devolvemos la vista con los usuarios
        return Inertia::render('Usuarios/Index', [
            'usuarios' => $usuarios,
        ]);
    }

    // Método para mostrar un solo usuario
    public function show($id)
    {
        // Buscamos al usuario por su id
        $usuario = Usuario::findOrFail($id);

        // Devolvemos la vista con el usuario encontrado
        return Inertia::render('Usuarios/Show', [
            'usuario' => $usuario,
        ]);
    }



    public function create()
    {
        return Inertia::render('Usuarios/Create');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return Inertia::render('Usuarios/Edit', ['usuario' => $usuario]);
    }

    public function store(Request $request)
    {
        Usuario::create([
            ...$request->all(),
            ...$request->validate([
                'tipo' => ['required', 'string', 'max:255'],
                'nombre' => ['required', 'string', 'max:255'],
                'apellidos' => ['required', 'string', 'max:255'],
                'direccion' => ['required', 'string', 'max:255'],
                'telefono' => ['required', 'string', 'max:20'],
                'correo' => ['required', 'email', 'max:255', 'unique:usuarios,correo'],
                'password' => ['required', 'string', 'min:8']
            ])
        ]);

        // Redireccionar a la lista de usuarios
        return redirect()->route('usuarios.index');
    }
}



