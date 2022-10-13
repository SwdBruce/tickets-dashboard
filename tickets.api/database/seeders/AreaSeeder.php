<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
            [
                'id' => 1,
                'nombre' => 'Administrativa',
                'descripcion' => 'Área administrativa'
            ],
            [
                'id' => 2,
                'nombre' => 'Soporte',
                'descripcion' => 'Área de soporte'
            ],
            [
                'id' => 3,
                'nombre' => 'Comercial',
                'descripcion' => 'Área comercial'
            ],
            [
                'id' => 4,
                'nombre' => 'Operaciones',
                'descripcion' => 'Área de operaciones'
            ],
            [
                'id' => 5,
                'nombre' => 'Sistemas',
                'descripcion' => 'Área de sistemas'
            ],
            [
                'id' => 6,
                'nombre' => 'Recursos Humanos',
                'descripcion' => 'Área de recursos humanos'
            ]
        ]);
    }
}
