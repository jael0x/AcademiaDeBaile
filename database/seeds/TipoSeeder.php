<?php

use App\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'titulo' => 'Noticia',
        ]);
        Tipo::create([
            'titulo' => 'Concurso',
        ]);
        Tipo::create([
            'titulo' => 'Taller',
        ]);
        Tipo::create([
            'titulo' => 'Seminario',
        ]);
        Tipo::create([
            'titulo' => 'Presentación',
        ]);
    }
}
