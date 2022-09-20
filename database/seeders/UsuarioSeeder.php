<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'apellidos' => 'Administrador',
                'nombres' => 'Administrador',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 1,
                'area_id' => 1
            ],
            [
                'username' => 'doctor',
                'password' => bcrypt('doctor'),
                'apellidos' => 'Doctor',
                'nombres' => 'Doctor',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 2,
                'area_id' => 1
            ],
            [
                'username' => 'enfermera',
                'password' => bcrypt('enfermera'),
                'apellidos' => 'Enfermera',
                'nombres' => 'Enfermera',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'paciente',
                'password' => bcrypt('paciente'),
                'apellidos' => 'Paciente',
                'nombres' => 'Paciente',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 4,
                'area_id' => 1
            ]
        ]);
    }
}
