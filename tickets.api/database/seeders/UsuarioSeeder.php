<?php

namespace Database\Seeders;

use App\Models\UsuarioModel;
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
        $usuarios = [
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
                'username' => 'jose',
                'password' => bcrypt('jose'),
                'apellidos' => 'Perez',
                'nombres' => 'Jose',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'maria',
                'password' => bcrypt('maria'),
                'apellidos' => 'Gomez',
                'nombres' => 'Maria',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'juan',
                'password' => bcrypt('juan'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Juan',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 6
            ],
            [
                'username' => 'luis',
                'password' => bcrypt('luis'),
                'apellidos' => 'Lopez',
                'nombres' => 'Luis',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'carlos',
                'password' => bcrypt('carlos'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carlos',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'ana',
                'password' => bcrypt('ana'),
                'apellidos' => 'Perez',
                'nombres' => 'Ana',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'josefina',
                'password' => bcrypt('josefina'),
                'apellidos' => 'Gomez',
                'nombres' => 'Josefina',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'jorge',
                'password' => bcrypt('jorge'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Jorge',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 4
            ],
            [
                'username' => 'luisa',
                'password' => bcrypt('luisa'),
                'apellidos' => 'Lopez',
                'nombres' => 'Luisa',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 6
            ],
            [
                'username' => 'carla',
                'password' => bcrypt('carla'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carla',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 5
            ],
            [
                'username' => 'javier',
                'password' => bcrypt('javier'),
                'apellidos' => 'Perez',
                'nombres' => 'Javier',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 4
            ],
            [
                'username' => 'marcela',
                'password' => bcrypt('marcela'),
                'apellidos' => 'Gomez',
                'nombres' => 'Marcela',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'juanita',
                'password' => bcrypt('juanita'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Juanita',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'lucia',
                'password' => bcrypt('lucia'),
                'apellidos' => 'Lopez',
                'nombres' => 'Lucia',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'carolinaw',
                'password' => bcrypt('carolina'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carolina',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'juliop',
                'password' => bcrypt('julio'),
                'apellidos' => 'Perez',
                'nombres' => 'Julio',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 5
            ],
            [
                'username' => 'marianap',
                'password' => bcrypt('mariana'),
                'apellidos' => 'Gomez',
                'nombres' => 'Mariana',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 4
            ],
            [
                'username' => 'juliana',
                'password' => bcrypt('juliana'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Juliana',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 5
            ],
            [
                'username' => 'luisito',
                'password' => bcrypt('luisito'),
                'apellidos' => 'Lopez',
                'nombres' => 'Luisito',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 6
            ],
            [
                'username' => 'carlitos',
                'password' => bcrypt('carlitos'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carlitos',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'javiera',
                'password' => bcrypt('javiera'),
                'apellidos' => 'Perez',
                'nombres' => 'Javiera',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'marcelo',
                'password' => bcrypt('marcelo'),
                'apellidos' => 'Gomez',
                'nombres' => 'Marcelo',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'juanito',
                'password' => bcrypt('juanito'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Juanito',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 4
            ],
            [
                'username' => 'luciaa',
                'password' => bcrypt('lucia'),
                'apellidos' => 'Lopez',
                'nombres' => 'Lucia',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 5
            ],
            [
                'username' => 'carolina',
                'password' => bcrypt('carolina'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carolina',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 6
            ],

            [
                'username' => 'mariana',
                'password' => bcrypt('mariana'),
                'apellidos' => 'Gomez',
                'nombres' => 'Mariana',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'julianaj',
                'password' => bcrypt('juliana'),
                'apellidos' => 'Gonzales',
                'nombres' => 'Juliana',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
            [
                'username' => 'luisitos',
                'password' => bcrypt('luisito'),
                'apellidos' => 'Lopez',
                'nombres' => 'Luisito',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 4
            ],
            [
                'username' => 'carlitosk',
                'password' => bcrypt('carlitos'),
                'apellidos' => 'Martinez',
                'nombres' => 'Carlitos',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 5
            ],
            [
                'username' => 'javierai',
                'password' => bcrypt('javiera'),
                'apellidos' => 'Perez',
                'nombres' => 'Javiera',
                'sexo' => 'F',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 6
            ],
            [
                'username' => 'marcelom',
                'password' => bcrypt('marcelo'),
                'apellidos' => 'Gomez',
                'nombres' => 'Marcelo',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 1
            ],
            [
                'username' => 'juanitoc',
                'password' => bcrypt('juanito'),
                'apellido' => 'Gonzales',
                'nombres' => 'Juanito',
                'sexo' => 'M',
                'estado' => 1,
                'rol_id' => 3,
                'area_id' => 3
            ],
        ];
        DB::table('usuario')->insert($usuarios);
    }
}
