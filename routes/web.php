<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ServicioController;

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});*/

Route::get('/', function () {
    return Inertia::render('Home'); // Página de inicio
});

// Asegúrate de que la ruta /main esté definida
Route::get('/main', function () {
    return Inertia::render('Main'); // Asegúrate de que 'Main.vue' exista en la carpeta Pages
});


Route::resource('usuarios', UsuarioController::class);
Route::get('usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');


Route::resource('clientes', ClienteController::class);
Route::get('clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

//Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');
//Route::get('/animales/{id}', [AnimalController::class, 'show'])->name('animales.show');

Route::resource('animales', AnimalController::class);
Route::get('animales/{id}', [AnimalController::class, 'show'])->name('animales.show');
Route::delete('/animales/{id}', [AnimalController::class, 'destroy'])->name('animales.destroy');



Route::resource('servicios', ServicioController::class);
Route::get('servicios/{id}', [AnimalController::class, 'show'])->name('servicios.show');
