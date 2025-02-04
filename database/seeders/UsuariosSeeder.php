<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        // Cargar datos desde el archivo JSON
        $json = File::get(database_path('seeders/usuarios.json'));
        $usuarios = json_decode($json, true); // Decodificar el JSON en un array

        // Insertar los datos en la tabla 'usuarios'
        DB::table('usuarios')->insert($usuarios);
    }
}
