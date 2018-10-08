<?php

use App\Docente;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::create([
            'nombre' => 'Ninette Durán Iglesias',
            'cedula' => '1756410088',
            'fecha_ingreso' => '2018-08-01',
        ]);
    }
}
