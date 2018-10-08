<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class PeriodoController extends Controller
{
    public function meses(){
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];
        return $meses;
    }
    public function index()
    {
        $title = 'Periodos';    
        $periodos = Periodo::all();
        return view('periodo.index', compact('title', 'periodos'));
    }
    public function create()
    {
        $title = 'Crear Periodo';
        $meses = $this->meses();
        return view('periodo.create', compact('title', 'meses'));
    }
    public function store()
    {
        $data = request()->validate([
            'titulo' => 'required | unique:periodos,titulo',
            'mes_ini' => 'required',
            'anio_ini' => 'required',
            'mes_fin' => 'required',
            'anio_fin' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título para este periodo',
            'titulo.unique' => 'Ya existe un periodo con ese titulo',
            'mes_ini.required' => 'Seleccione un mes de inicio',
            'anio_ini.required' => 'Ingrese un año de inicio',
            'mes_fin.required' => 'Seleccione un mes de finalización',
            'anio_fin.required' => 'Ingrese un año de finalización',
        ]);

        Periodo::create([
            'titulo' => $data['titulo'],
            'mes_ini' => $data['mes_ini'],
            'anio_ini' => $data['anio_ini'],
            'mes_fin' => $data['mes_fin'],
            'anio_fin' => $data['anio_fin'],
        ]);

        return redirect()->route('periodos.index');
    }
    public function detail(Periodo $periodo)
    {
        $title = 'Mostrar Periodo';
        $eventos = $periodo->eventos->count();
        $cursos = $periodo->cursos->count();
        return view('periodo.detail', compact('title', 'periodo', 'eventos', 'cursos'));
    }
    public function edit(Periodo $periodo)
    {
        $title = 'Editar Periodo';
        $meses = $this->meses();
        return view('periodo.edit', compact('title', 'periodo', 'meses'));
    }
    public function update(Periodo $periodo)
    {
        $data = request()->validate([
            'titulo' => 'required | unique:periodos,titulo',
            'mes_ini' => 'required',
            'anio_ini' => 'required',
            'mes_fin' => 'required',
            'anio_fin' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título para este periodo',
            'titulo.unique' => 'Ya existe un periodo con ese titulo',
            'mes_ini.required' => 'Seleccione un mes de inicio',
            'anio_ini.required' => 'Ingrese un año de inicio',
            'mes_fin.required' => 'Seleccione un mes de finalización',
            'anio_fin.required' => 'Ingrese un año de finalización',
        ]);
        
        $periodo->update($data);

        return redirect()->route('periodos.index');
    }
    public function delete(Periodo $periodo)
    {
        $eventos = $periodo->eventos->count();
        $cursos = $periodo->cursos->count();
        if(!($eventos > 0 || $cursos > 0)){
            $periodo->delete();
        }
        return redirect()->route('periodos.index');
    }
}
