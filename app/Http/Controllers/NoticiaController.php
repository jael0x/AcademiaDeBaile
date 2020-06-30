<?php

namespace App\Http\Controllers;

use App\NotiEven;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'titulo' => 'required|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.regex' => 'Hay carácteres no permitidos',
            'descripcion.required' => 'Ingrese un contenido',
        ]);
                
        $data = request();

        $path = '';
        
        if($data['img_url']){
                //Hosting
            // $path = '/storage/app/public/'.$data->file('img_url')->storeAs(
                //Local
            $path = '/storage/'.$data->file('img_url')->storeAs(
                'noticias',
                str_replace(' ', '_', $data['titulo']).'_'.time().'.'.$data['img_url']->getClientOriginalExtension(),
                'public'
            );
        }

        NotiEven::create([
            'titulo' => $data['titulo'],
            'fecha' => new Date(),
            'tipo_id' => '1',
            'descripcion' => $data['descripcion'],
            'img_url' => $path,
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
            'titulo' => 'required|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.regex' => 'Hay carácteres no permitidos',
            'descripcion.required' => 'Ingrese un contenido',
        ]);
        
        $data = request();

        $path = '';
        
        if($data['img_url']){
                //Hosting
            // $path = '/storage/app/public/'.$data->file('img_url')->storeAs(
                //Local
            $path = '/storage/'.$data->file('img_url')->storeAs(
                'noticias',
                str_replace(' ', '_', $data['titulo']).'_'.time().'.'.$data['img_url']->getClientOriginalExtension(),
                'public'
            );
        }

        $notieven->update([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'img_url' => $path,
        ]);

        return redirect()->route('noticias.index');
    }
    public function delete(NotiEven $notieven)
    {
        $notieven->delete();
        return redirect()->route('noticias.index');
    }
}
