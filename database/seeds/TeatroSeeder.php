<?php

use App\Teatro;
use Illuminate\Database\Seeder;

class TeatroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teatro::create([
            'nombre' => 'Teatro Lalama',
            'direccion' => 'Bolívar, entre Joaquín Lalama y Martínez',
        ]);
    }
}
