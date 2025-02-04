<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        // Cargar datos desde el archivo JSON
        $json = File::get(database_path('seeders/clientes.json'));
        $clientes = json_decode($json, true); // Decodificar el JSON en un array

        // Insertar los datos en la tabla 'clientes'
        DB::table('clientes')->insert($clientes);
    }
}
