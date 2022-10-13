<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            [
                'id' => 1,
                'nombre' => 'Administrador',
                'descripcion' => 'Administrador del sistema'
            ],
            [
                'id' => 2,
                'nombre' => 'Soporte',
                'descripcion' => 'Usuario de soporte'
            ],
            [
                'id' => 3,
                'nombre' => 'Cliente',
                'descripcion' => 'Usuario del sistema'
            ]
        ]);
    }
}
