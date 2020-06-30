<?php

use App\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'titulo' => 'principal',
                //Hosting
            // 'url' => 'storage/app/public/principal/inicial.jpg',
                //Local
            'url' => 'storage/principal/inicial.jpg',
        ]);
        Image::create([
            'titulo' => 'cursos',
                //Hosting
            // 'url' => 'storage/app/public/cursos/inicial.jpg',
                //Local
            'url' => 'storage/cursos/inicial.jpg',
        ]);
        Image::create([
            'titulo' => 'notievens',
                //Hosting
            // 'url' => 'storage/app/public/notievens/inicial.jpg',
                //Local
            'url' => 'storage/notievens/inicial.jpg',
        ]);
        Image::create([
            'titulo' => 'instagram',
            'url' => '1913027279.1677ed0.f3b83f1a46944944ab0022a0eb698c1c',
        ]);
    }
}
