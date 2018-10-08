<?php

namespace App\Http\Controllers;

use App\NotiEven;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class NoticiaController extends Controller
{
    public function index()
    {
        $title = 'Noticias';
        $noticias = NotiEven::where('tipo_id', '1')->get()->sortByDesc('fecha');
        return view('noticia.index', compact('title', 'noticias'));
    }
    public function create()
    {
        $title = 'Crear Noticia';
        return view('noticia.create', compact('title'));
    }
    public function store()
    {
        $data = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'img_url' => '',
        ],[
            'titulo.required' => 'Ingrese un título',
            'descripcion.required' => 'Ingrese un contenido',
        ]);

        NotiEven::create([
            'titulo' => $data['titulo'],
            'fecha' => new Date(),
            'tipo_id' => '1',
            'descripcion' => $data['descripcion'],
            'img_url' => $data['img_url'],
            'teatro_id' => null,
            'fecha_eve' => null,
            'hora_eve' => null,
            'precio' => null,
            'docente_id' => null,
            'periodo_id' => null,
        ]);

        return redirect()->route('noticias.index');
    }
    public function detail(NotiEven $notieven)
    {
        $title = 'Mostrar Noticia';
        return view('noticia.detail', compact('title', 'notieven'));
    }
    public function edit(NotiEven $notieven)
    {
        $title = 'Editar Noticia';
        return view('noticia.edit', compact('title', 'notieven'));
    }
    public function update(NotiEven $notieven)
    {
        $data = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'img_url' => '',
        ],[
            'titulo.required' => 'Ingrese un título',
            'descripcion.required' => 'Ingrese un contenido',
        ]);

        $notieven->update($data);

        return redirect()->route('noticias.index');
    }
    public function delete(NotiEven $notieven)
    {
        $notieven->delete();
        return redirect()->route('noticias.index');
    }
}
