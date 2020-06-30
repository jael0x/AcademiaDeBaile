<?php

namespace App\Http\Controllers;

use App\NotiEven;
use App\Tipo;
use App\Teatro;
use App\Periodo;
use App\Docente;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Eventos';
        $eventos = NotiEven::where('tipo_id', '!=', '1')->get()->sortByDesc('fecha')->sortByDesc('fecha_eve');
        return view('evento.index', compact('title', 'eventos'));
    }
    public function create()
    {
        $title = 'Crear Evento';
        $tipos = Tipo::where('id', '!=', '1')->get();
        $teatros = Teatro::all();
        $docentes = Docente::all();
        $periodos = Periodo::all();
        return view('evento.create', compact('title', 'tipos', 'teatros', 'periodos', 'docentes'));
    }
    public function store()
    {
        // $data = request();
        // dd($data);
        $data = request()->validate([
            'titulo' => 'required|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required',
            'tipo_id' => 'required',
            'fecha_eve' => 'required',
            'hora_eve' => 'required',
            'teatro_id' => 'required',
            'precio' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.regex' => 'Hay carácteres no permitidos',
            'descripcion.required' => 'Ingrese una descripción',
            'tipo_id.required' => 'Seleccione un tipo de evento',
            'fecha_eve.required' => 'La fecha del evento es necesaria',
            'hora_eve.required' => 'La hora del evento es necesaria',
            'teatro_id.required' => 'Seleccione un teatro',
            'precio.required' => 'Ingrese un precio',
        ]);

        $data = request();

        $path = '';

        if($data['img_url']){
            $path = '/storage/'.$data->file('img_url')->storeAs(
                'eventos',
                str_replace(' ', '_', $data['titulo']).'_'.time().'.'.$data['img_url']->getClientOriginalExtension(),
                'public'
            );
        }

        NotiEven::create([
            'titulo' => $data['titulo'],
            'fecha' => new Date(),
            'tipo_id' => $data['tipo_id'],
            'descripcion' => $data['descripcion'],
            'img_url' => $path,
            'teatro_id' => $data['teatro_id'],
            'fecha_eve' => $data['fecha_eve'],
            'hora_eve' => $data['hora_eve'],
            'precio' => $data['precio'],
            'docente_id' => $data['docente_id'],
            'periodo_id' => $data['periodo_id'],
        ]);

        return redirect()->route('eventos.index');
    }
    public function detail(NotiEven $notieven)
    {
        $title = 'Mostrar Evento';
        return view('evento.detail', compact('title', 'notieven'));
    }
    public function edit(NotiEven $notieven)
    {
        $title = 'Editar Evento';
        $tipos = Tipo::where('id', '!=', '1')->get();
        $teatros = Teatro::all();
        $docentes = Docente::all();
        $periodos = Periodo::all();
        return view('evento.edit', compact('title', 'notieven', 'tipos', 'teatros', 'docentes', 'periodos'));
    }
    public function update(NotiEven $notieven)
    {
        $data = request()->validate([
            'titulo' => 'required|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required',
            'tipo_id' => 'required',
            'fecha_eve' => 'required',
            'hora_eve' => 'required',
            'teatro_id' => 'required',
            'precio' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.regex' => 'Hay carácteres no permitidos',
            'descripcion.required' => 'Ingrese una descripción',
            'tipo_id.required' => 'Seleccione un tipo de evento',
            'fecha_eve.required' => 'La fecha del evento es necesaria',
            'hora_eve.required' => 'La hora del evento es necesaria',
            'teatro_id.required' => 'Seleccione un teatro',
            'precio.required' => 'Ingrese un precio',
        ]);

        $data = request();

        $path = '';

        if($data['img_url']){
            $path = '/storage/'.$data->file('img_url')->storeAs(
                'eventos',
                str_replace(' ', '_', $data['titulo']).'_'.time().'.'.$data['img_url']->getClientOriginalExtension(),
                'public'
            );
        }
        
        $notieven->update([
            'titulo' => $data['titulo'],
            'tipo_id' => $data['tipo_id'],
            'descripcion' => $data['descripcion'],
            'img_url' => $path,
            'teatro_id' => $data['teatro_id'],
            'fecha_eve' => $data['fecha_eve'],
            'hora_eve' => $data['hora_eve'],
            'precio' => $data['precio'],
            'docente_id' => $data['docente_id'],
            'periodo_id' => $data['periodo_id'],
        ]);

        return redirect()->route('eventos.index');
    }
    public function delete(NotiEven $notieven)
    {
        $notieven->delete();
        return redirect()->route('eventos.index');
    }
}
