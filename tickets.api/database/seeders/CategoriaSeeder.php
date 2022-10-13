<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            [
                'nombre' => 'Incidencia',
                'descripcion' => 'Incidencia',
                'color' => 'red',
                'estado' => 1
            ],
            [
                'nombre' => 'Consulta',
                'descripcion' => 'Consulta',
                'color' => 'blue',
                'estado' => 1
            ],
            [
                'nombre' => 'General',
                'descripcion' => 'General',
                'color' => 'green',
                'estado' => 1
            ]
        ]);
    }
}
