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
                'nombre' => 'Importante',
                'descripcion' => 'Importante',
                'color' => '#FF0000',
                'estado' => 1
            ],
            [
                'nombre' => 'Moderado',
                'descripcion' => 'Moderado',
                'color' => '#FFA500',
                'estado' => 1
            ],
            [
                'nombre' => 'Menor',
                'descripcion' => 'Menor',
                'color' => '#FFFF00',
                'estado' => 1
            ],
            [
                'nombre' => 'Sin prioridad',
                'descripcion' => 'Sin prioridad',
                'color' => '#00FF00',
                'estado' => 1
            ]
        ]);
    }
}
