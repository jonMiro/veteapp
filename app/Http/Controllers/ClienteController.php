<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra todos los clientes
    public function index()
    {
        $clientes = Cliente::all(); // Obtiene todos los clientes de la base de datos
        return Inertia::render('Clientes/Index', [
            'clientes' => $clientes, // Pasa los clientes a la vista Inertia
        ]);
    }

    // Muestra los detalles de un cliente
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id); // Encuentra al cliente por ID, o lanza un error 404 si no existe
        return Inertia::render('Clientes/Show', [
            'cliente' => $cliente, // Pasa los detalles del cliente a la vista
        ]);
    }

    // Muestra el formulario para crear un nuevo cliente
    public function create()
    {
        return Inertia::render('Clientes/Create'); // Muestra la vista de creación
    }

    // Almacena un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo', // Asegura que el correo es único
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Crea el cliente con los datos validados
        Cliente::create($request->all());

        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    // Muestra el formulario para editar un cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id); // Encuentra al cliente por ID
        return Inertia::render('Clientes/Edit', [
            'cliente' => $cliente, // Pasa los detalles del cliente a la vista de edición
        ]);
    }

    // Actualiza los datos de un cliente en la base de datos
    public function update(Request $request, $id)
    {


        // Validación de los campos, permitiendo el correo único excepto para el cliente actual
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $id, // Se permite que el cliente actual mantenga su correo
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Actualiza los datos del cliente
        $cliente = Cliente::findOrFail($id); // Encuentra al cliente por ID
        $cliente->update($data);

        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('clientes.index');
    }
    public function destroy($id)
{
    $cliente = Cliente::findOrFail($id); // Encuentra al cliente por ID, o lanza un error 404 si no existe
    $cliente->delete(); // Elimina el cliente

    // Redirige a la lista de clientes con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
}
}
