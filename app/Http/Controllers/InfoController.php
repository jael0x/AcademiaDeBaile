<?php

namespace App\Http\Controllers;

use App\Curso;
use App\NotiEven;
use App\Image;
use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class InfoController extends Controller
{
    public function bienvenido()
    {
        $imgprincipal = Image::find(1);
        $imgcursos = Image::find(2);
        $imgnotieven = Image::find(3);
        return view('info.bienvenido', compact('imgprincipal', 'imgcursos', 'imgnotieven'));
    }

    public function nosotros()
    {
        return view('info.nosotros');
    }

    public function multimedia()
    {
        $token = Image::find(4);
        // dd($token->url);
        $instagram = new Instagram($token->url);
        $media = $instagram->get();
        $title = 'Multimedia';
        return view('info.multimedia', compact('title', 'media'));
    }
    
    public function cursos()
    {
        $cursos = Curso::all();
        $title = 'Cursos';

        return view('info.cursos', compact('title', 'colors', 'cursos'));
    }
    
    public function notieven()
    {
        $title = 'Noticias y Eventos';
        $notievens = NotiEven::all()->sortByDesc('fecha');

        // return view('prueba', compact('title', 'notievens'));
        return view('info.notieven', compact('title', 'notievens'));
    }

    public function notievenshow(NotiEven $notieven){
        return view('info.notievenshow', compact('notieven'));
    }
}
