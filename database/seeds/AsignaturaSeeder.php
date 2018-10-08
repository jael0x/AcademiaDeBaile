<?php

use App\Asignatura;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Baby Ballet
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '1',
        ]);
        Asignatura::create([
            'titulo_id' => '2',
            'docente_id' => '1',
            'curso_id' => '1',
        ]);
        //Pre Ballet
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '2',
        ]);
        Asignatura::create([
            'titulo_id' => '2',
            'docente_id' => '1',
            'curso_id' => '2',
        ]);
        //Inicial
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '3',
        ]);
        Asignatura::create([
            'titulo_id' => '3',
            'docente_id' => '1',
            'curso_id' => '3',
        ]);
        Asignatura::create([
            'titulo_id' => '4',
            'docente_id' => '1',
            'curso_id' => '3',
        ]);
        //Intermedio
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '4',
        ]);
        Asignatura::create([
            'titulo_id' => '3',
            'docente_id' => '1',
            'curso_id' => '4',
        ]);
        Asignatura::create([
            'titulo_id' => '4',
            'docente_id' => '1',
            'curso_id' => '4',
        ]);
        //Avanzado
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '5',
        ]);
        Asignatura::create([
            'titulo_id' => '3',
            'docente_id' => '1',
            'curso_id' => '5',
        ]);
        Asignatura::create([
            'titulo_id' => '4',
            'docente_id' => '1',
            'curso_id' => '5',
        ]);
        //Jovenes y Adultos
        Asignatura::create([
            'titulo_id' => '1',
            'docente_id' => '1',
            'curso_id' => '6',
        ]);
    }
}
