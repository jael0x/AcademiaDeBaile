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
            'titulo' => 'Muy Pronto una gran Sorpresa!',
            'fecha' => '2018-09-18',
            'tipo_id' => '1',
            'descripcion' => 'Se acerca algo interesante...',
            'img_url' => 'https://i.ytimg.com/vi/kgVDoVLEe2c/maxresdefault.jpg',
            'teatro_id' => null,
            'fecha_eve' => null,
            'hora_eve' => null,
            'precio' => null,
            'docente_id' => null,
            'periodo_id' => null,
        ]);
        NotiEven::create([
            'titulo' => 'Nueva página web',
            'fecha' => '2018-09-21',
            'tipo_id' => '1',
            'descripcion' => 'Tenemos el placer de ofreceros nuestra nueva página web! para una mejor y más agradable experiencia para el visitante. Toda la información sobre la Academia de Baile Ninette, nuestra actividad, noticias, eventos, clases, cursos intensivos, talleres.',
            'img_url' => '',
            'teatro_id' => null,
            'fecha_eve' => null,
            'hora_eve' => null,
            'precio' => null,
            'docente_id' => null,
            'periodo_id' => null,
        ]);
        NotiEven::create([
            'titulo' => 'Regreso a los 80s',
            'fecha' => '2018-09-22',
            'tipo_id' => '4',
            'descripcion' => 'Una deslumbrante celebración de la década de 1980, una era de modas innovadoras, peinados audaces, inquietud política y cambio social; en un contexto de música legendaria. El material del West End lleno de éxitos muestra a Chess (Benny Anderson, Bjorn Ulvaeus y Tim Rice) y Song and Dance (Andrew Lloyd Webber, Don Black y Richard Maltby), éxitos de los artistas que redefinieron el género pop (Michael Jackson, Madonna, Prince, David Bowie, Duran Duran) y extractos de los musicales más famosos de la década. Regreso a los 80s promete ser un viaje extravagante, de alto octanaje, se siente bien y nunca lo olvidarás.',
            'img_url' => 'https://www.northernballetschool.co.uk/img/news/73-flashback-to-the-80s-lg.jpg',
            'teatro_id' => '1',
            'fecha_eve' => '2018-09-22',
            'hora_eve' => '19:00:00',
            'precio' => '15',
            'docente_id' => '1',
            'periodo_id' => '1',
        ]);
        NotiEven::create([
            'titulo' => 'Workshop de Danzas de Salón',
            'fecha' => '2018-09-24',
            'tipo_id' => '3',
            'descripcion' => 'Danzas europeas del siglo XV al XIX',
            'img_url' => '',
            'teatro_id' => '1',
            'fecha_eve' => '2018-09-29',
            'hora_eve' => '09:30:00',
            'precio' => '5',
            'docente_id' => '1',
            'periodo_id' => '1',
        ]);
    }
}
