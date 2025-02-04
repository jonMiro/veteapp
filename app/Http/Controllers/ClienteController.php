<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // Aquí obtendremos todos los clientes
        $clientes = Cliente::all();
        return Inertia::render('Clientes/Index', [
            'clientes' => $clientes,
        ]);
    }

    public function show($id)
    {
        // Mostrar un cliente específico por ID
        $cliente = Cliente::findOrFail($id);
        return Inertia::render('Clientes/Show', [
            'cliente' => $cliente,
        ]);
    }
}
