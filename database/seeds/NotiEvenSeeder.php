<?php

use App\NotiEven;
use Illuminate\Database\Seeder;

class NotiEvenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotiEven::create([
            'titulo' => 'Nueva página web',
            'fecha' => '2018-11-08',
            'tipo_id' => '1',
            'descripcion' => 'Tenemos el placer de presentar nuestra nueva página web! Toda la información sobre la Academia de Baile Ninette, nuestra actividad, noticias, eventos, clases, cursos y talleres.',
                //Hosting
            // 'img_url' => 'storage/app/public/noticias/newweb.jpg',
                //Local
            'img_url' => 'storage/noticias/newweb.jpg',
            'teatro_id' => null,
            'fecha_eve' => null,
            'hora_eve' => null,
            'precio' => null,
            'docente_id' => null,
            'periodo_id' => null,
        ]);
    }
}
