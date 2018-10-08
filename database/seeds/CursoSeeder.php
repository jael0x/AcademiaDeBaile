<?php

use App\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'titulo' => 'Baby Ballet',
            'edad_min' => '3',
            'edad_max' => '4',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '35',
            'color_id' => '1',
        ]);
        Curso::create([
            'titulo' => 'Pre Ballet',
            'edad_min' => '5',
            'edad_max' => '7',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '45',
            'color_id' => '2',
        ]);
        Curso::create([
            'titulo' => 'Inicial Ballet',
            'edad_min' => '8',
            'edad_max' => '11',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '70',
            'color_id' => '3',
        ]);
        Curso::create([
            'titulo' => 'Intermedio',
            'edad_min' => '12',
            'edad_max' => '14',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '70',
            'color_id' => '4',
        ]);
        Curso::create([
            'titulo' => 'Avanzado',
            'edad_min' => '15',
            'edad_max' => '17',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '70',
            'color_id' => '5',
        ]);
        Curso::create([
            'titulo' => 'Jóvenes y Adultos',
            'edad_min' => '18',
            'edad_max' => '99',
            'periodo_id' => '1',
            'precio_inscripcion' => '10',
            'precio_mensual' => '35',
            'color_id' => '6',
        ]);
    }
}
