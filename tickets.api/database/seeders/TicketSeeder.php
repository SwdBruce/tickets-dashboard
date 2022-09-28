<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket')->insert([
            [
                'titulo' => 'Ticket 1',
                'descripcion' => 'Descripcion del ticket 1',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 2',
                'descripcion' => 'Descripcion del ticket 2',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 3',
                'descripcion' => 'Descripcion del ticket 3',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 4',
                'descripcion' => 'Descripcion del ticket 4',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 5',
                'descripcion' => 'Descripcion del ticket 5',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 6',
                'descripcion' => 'Descripcion del ticket 6',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 7',
                'descripcion' => 'Descripcion del ticket 7',
                'usuario_id' => 1,
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
            [
                'titulo' => 'Ticket 8',
                'descripcion' => 'Descripcion del ticket 8',
                'usuario_id',
                'asignado_id' => 2,
                'categoria_id' => 1,
                'area_id' => 1,
                'estado' => 1
            ],
        ]);
    }
}
