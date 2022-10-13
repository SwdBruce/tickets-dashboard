<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('impacto')->insert([
            [
                'nombre' => 'Bajo',
                'descripcion' => 'Bajo',
                'color' => 'green',
            ],
            [
                'nombre' => 'Medio',
                'descripcion' => 'Medio',
                'color' => 'blue',
            ],
            [
                'nombre' => 'Alto',
                'descripcion' => 'Alto',
                'color' => 'orange',
            ],
            [
                'nombre' => 'Crítico',
                'descripcion' => 'Crítico',
                'color' => 'red',
            ],
        ]);
    }
}
