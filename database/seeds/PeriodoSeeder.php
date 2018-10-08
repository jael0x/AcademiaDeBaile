<?php

use App\Periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'titulo' => 'Sep-Nov 2018',
            'mes_ini' => '09',
            'anio_ini' => '2018',
            'mes_fin' => '11',
            'anio_fin' => '2018',
        ]);
        Periodo::create([
            'titulo' => 'Dic 2018-Abr 2019',
            'mes_ini' => '12',
            'anio_ini' => '2018',
            'mes_fin' => '04',
            'anio_fin' => '2019',
        ]);
        Periodo::create([
            'titulo' => 'Vacacional 2019',
            'mes_ini' => '06',
            'anio_ini' => '2019',
            'mes_fin' => '08',
            'anio_fin' => '2019',
        ]);
    }
}
