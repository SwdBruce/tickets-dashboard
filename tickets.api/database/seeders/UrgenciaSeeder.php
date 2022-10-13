<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urgencia')->insert([
            [
                'nombre' => 'Baja',
                'descripcion' => 'Baja',
                'color' => 'green',
            ],
            [
                'nombre' => 'Media',
                'descripcion' => 'Media',
                'color' => 'blue',
            ],
            [
                'nombre' => 'Alta',
                'descripcion' => 'Alta',
                'color' => 'orange',
            ],
            [
                'nombre' => 'Urgente',
                'descripcion' => 'Urgente',
                'color' => 'red',
            ],
        ]);
    }
}
