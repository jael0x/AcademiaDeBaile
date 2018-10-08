<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        $title = 'Tipos de Eventos';
        $tipos = Tipo::all();
        return view('tipo.index', compact('title', 'tipos'));
    }
    public function create()
    {
        $title = 'Crear Tipo de evento';
        return view('tipo.create', compact('title'));
    }
    public function store()
    {
        $data = request()->validate([
            'titulo' => 'required | unique:tipos,titulo',
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.unique' => 'Ya existe un tipo de evento como este',
        ]);

        Tipo::create([
            'titulo' => $data['titulo'],
        ]);

        return redirect()->route('tipos.index');
    }
    // public function detail(Tipo $tipo)
    // {
    //     $title = 'Mostrar Tipo de Evento';
    //     return view('tipo.detail', compact('title', 'tipo'));
    // }
    public function edit(Tipo $tipo)
    {
        $title = 'Editar Tipo de Evento';
        if($tipo->id != 1)
            return view('tipo.edit', compact('title', 'tipo'));
        else{
            $title = 'Tipos de Eventos';
            $tipos = Tipo::all();
            return view('tipo.index', compact('title', 'tipos'));
        }
    }
    public function update(Tipo $tipo)
    {
        $data = request()->validate([
            'titulo' => 'required | unique:tipos,titulo,'.$tipo->id,
        ],[
            'titulo.required' => 'Ingrese un título',
            'titulo.unique' => 'Ya existe un tipo de evento como este',
        ]);

        if($tipo->id != 1){
            $tipo->update($data);
        }

        return redirect()->route('tipos.index');
    }
    // public function delete(Tipo $tipo)
    // {
    //     $tipo->delete();
    //     return redirect()->route('tipos.index');
    // }
}
