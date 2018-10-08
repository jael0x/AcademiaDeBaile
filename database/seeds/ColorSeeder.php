<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'titulo' => 'Cyan',
            'color1' => 'cyan lighten-2',
            'color2' => 'cyan lighten-3',
        ]);
        Color::create([
            'titulo' => 'Verde',
            'color1' => 'green accent-4',
            'color2' => 'green accent-3',
        ]);
        Color::create([
            'titulo' => 'Morado',
            'color1' => 'purple lighten-1',
            'color2' => 'purple lighten-2',
        ]);
        Color::create([
            'titulo' => 'Azul',
            'color1' => 'indigo lighten-1',
            'color2' => 'indigo lighten-2',
        ]);
        Color::create([
            'titulo' => 'Rojo',
            'color1' => 'red lighten-1',
            'color2' => 'red lighten-2',
        ]);
        Color::create([
            'titulo' => 'Amarillo',
            'color1' => 'yellow darken-1',
            'color2' => 'yellow lighten-1',
        ]);
        Color::create([
            'titulo' => 'Rosado',
            'color1' => 'pink lighten-2',
            'color2' => 'pink lighten-3',
        ]);
        Color::create([
            'titulo' => 'Cafe',
            'color1' => 'brown lighten-1',
            'color2' => 'brown lighten-2',
        ]);
        Color::create([
            'titulo' => 'Gris',
            'color1' => 'grey darken-1',
            'color2' => 'grey',
        ]);
    }
}
