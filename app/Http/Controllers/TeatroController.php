<?php

namespace App\Http\Controllers;

use  App\Teatro;
use Illuminate\Http\Request;

class TeatroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Teatros';
        $teatros = Teatro::all();
        return view('teatro.index', compact('title', 'teatros'));
    }
    public function create()
    {
        $title = 'Crear Teatro';
        return view('teatro.create', compact('title'));
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ],[
            'nombre.required' => 'Ingrese un nombre',
            'direccion.required' => 'Ingrese una dirección',
        ]);

        Teatro::create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
        ]);

        return redirect()->route('teatros.index');
    }
    public function detail(Teatro $teatro)
    {
        $title = 'Mostrar Teatro';
        return view('teatro.detail', compact('title', 'teatro'));
    }
    public function edit(Teatro $teatro)
    {
        $title = 'Editar Teatro';
        return view('teatro.edit', compact('title', 'teatro'));
    }
    public function update(Teatro $teatro)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ],[
            'nombre.required' => 'Ingrese un nombre',
            'direccion.required' => 'Ingrese una dirección',
        ]);

        $teatro->update($data);

        return redirect()->route('teatros.index');
    }
    public function delete(Teatro $teatro)
    {
        $teatro->delete();
        return redirect()->route('teatros.index');
    }
}
