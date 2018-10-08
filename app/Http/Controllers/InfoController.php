<?php

namespace App\Http\Controllers;

use App\Curso;
use App\NotiEven;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function bienvenido()
    {
        return view('info.bienvenido');
    }

    public function nosotros()
    {
        return view('info.nosotros');
    }

    public function multimedia()
    {
        $title = 'Multimedia';
        return view('info.multimedia', compact('title'));
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
