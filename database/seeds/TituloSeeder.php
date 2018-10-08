<?php

use App\Titulo;
use Illuminate\Database\Seeder;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Titulo::create([
            'titulo' => 'Ballet',
        ]);
        Titulo::create([
            'titulo' => 'Gimnasia',
        ]);
        Titulo::create([
            'titulo' => 'Fitness',
        ]);
        Titulo::create([
            'titulo' => 'Repertorio',
        ]);
    }
}
