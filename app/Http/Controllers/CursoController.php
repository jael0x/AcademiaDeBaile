<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Periodo;
use App\Color;
use App\Docente;
use App\Titulo;
use App\Asignatura;
use App\Horario;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Cursos';
        $cursos = Curso::all();
        return view('curso.index', compact('title', 'cursos'));
    }
    public function create()
    {
        $title = 'Crear Curso';
        $periodos = Periodo::all();
        $colors = Color::all();
        $docentes = Docente::all();
        return view('curso.create', compact('title', 'periodos', 'colors', 'docentes'));
    }
    public function store()
    {
        // $data = request();
        // dd($data);
        
        $data = request()->validate([
            'titulo' => 'required',
            'edad_min' => 'required',
            'edad_max' => 'required',
            'precio_inscripcion' => 'required',
            'precio_mensual' => 'required',
            'periodo_id' => '',
            'color_id' => 'required',
            'asigTitulos' => 'required',
            'asigDocentes' => 'required',
            'numHoras' => 'required',
            'horaIniciales' => 'required',
            'horaFinales' => 'required',
            'horaLun' => 'required',
            'horaMar' => 'required',
            'horaMie' => 'required',
            'horaJue' => 'required',
            'horaVie' => 'required',
            'horaSab' => 'required',
            'horaDom' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'edad_min.required' => 'Ingrese una edad mínima',
            'edad_max.required' => 'Ingrese una edad máxima',
            'precio_inscripcion.required' => 'Ingrese un costo de inscripción',
            'precio_mensual.required' => 'Ingrese el costo mensual',
            'color_id.required' => 'Seleccione un color',
            'asigTitulos.required' => 'Ingrese al menos una asignatura',
        ]);

        $newCurso = Curso::create([
            'titulo' => $data['titulo'],
            'edad_min' => $data['edad_min'],
            'edad_max' => $data['edad_max'],
            'periodo_id' => $data['periodo_id'],
            'precio_inscripcion' => $data['precio_inscripcion'],
            'precio_mensual' => $data['precio_mensual'],
            'color_id' => $data['color_id'],
        ]);

        $i = 0; //recorre todos los horarios
        $c = 0; //controla el numero de horarios por asignatura
        $dias = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];

        foreach ($data['asigTitulos'] as $idAsig => $item) {
            $newTitulo = Titulo::where('titulo', $item)->first();

            if(!$newTitulo){
                $newTitulo = Titulo::create([
                    'titulo' => $item,
                ]);
            }

            $newAsignatura = Asignatura::create([
                'titulo_id' => $newTitulo->id,
                'docente_id' => $data['asigDocentes'][$idAsig],
                'curso_id' => $newCurso->id,
            ]);

            $c += $data['numHoras'][$idAsig];

            for ($i; $i < $c; $i++) { 
                foreach ($dias as $key => $dia) {
                    if($data['hora'.$dia][$i]){
                        Horario::create([
                            'asignatura_id' => $newAsignatura->id,
                            'dia' => $key+1,
                            'hora_ini' => $data['horaIniciales'][$i],
                            'hora_fin' => $data['horaFinales'][$i],
                        ]);
                    }
                }
            }
        }

        return redirect()->route('cursos.index');
    }
    public function detail(Curso $curso)
    {
        $title = 'Mostrar Curso';
        return view('curso.detail', compact('title', 'curso'));
    }
    public function edit(Curso $curso)
    {
        $title = 'Editar Curso';
        $colors = Color::all();
        $periodos = Periodo::all();
        $docentes = Docente::all();
        $dias = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];
        return view('curso.edit', compact('title', 'colors', 'periodos', 'curso', 'docentes', 'dias'));
    }
    public function update(Curso $curso)
    {
        // $data = request();
        // dd($data);

        $data = request()->validate([
            'titulo' => 'required',
            'edad_min' => 'required',
            'edad_max' => 'required',
            'precio_inscripcion' => 'required',
            'precio_mensual' => 'required',
            'periodo_id' => '',
            'color_id' => 'required',
            'asigTitulos' => 'required',
            'asigDocentes' => 'required',
            'numHoras' => 'required',
            'horaIniciales' => 'required',
            'horaFinales' => 'required',
            'horaLun' => 'required',
            'horaMar' => 'required',
            'horaMie' => 'required',
            'horaJue' => 'required',
            'horaVie' => 'required',
            'horaSab' => 'required',
            'horaDom' => 'required',
        ],[
            'titulo.required' => 'Ingrese un título',
            'edad_min.required' => 'Ingrese una edad mínima',
            'edad_max.required' => 'Ingrese una edad máxima',
            'precio_inscripcion.required' => 'Ingrese un costo de inscripción',
            'precio_mensual.required' => 'Ingrese el costo mensual',
            'color_id.required' => 'Seleccione un color',
            'asigTitulos.required' => 'Ingrese al menos una asignatura',
        ]);
        
        $newCurso = [
            'titulo' => $data['titulo'],
            'edad_min' => $data['edad_min'],
            'edad_max' => $data['edad_max'],
            'periodo_id' => $data['periodo_id'],
            'precio_inscripcion' => $data['precio_inscripcion'],
            'precio_mensual' => $data['precio_mensual'],
            'color_id' => $data['color_id'],
        ];

        $curso->update($newCurso);
        
        $this->deleteAsig($curso);

        $i = 0; //recorre todos los horarios
        $c = 0; //controla el numero de horarios por asignatura
        $dias = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];

        foreach ($data['asigTitulos'] as $idAsig => $item) {
            $newTitulo = Titulo::where('titulo', $item)->first();

            if(!$newTitulo){
                $newTitulo = Titulo::create([
                    'titulo' => $item,
                ]);
            }

            $newAsignatura = Asignatura::create([
                'titulo_id' => $newTitulo->id,
                'docente_id' => $data['asigDocentes'][$idAsig],
                'curso_id' => $curso->id,
            ]);

            $c += $data['numHoras'][$idAsig];

            for ($i; $i < $c; $i++) { 
                foreach ($dias as $key => $dia) {
                    if($data['hora'.$dia][$i]){
                        Horario::create([
                            'asignatura_id' => $newAsignatura->id,
                            'dia' => $key+1,
                            'hora_ini' => $data['horaIniciales'][$i],
                            'hora_fin' => $data['horaFinales'][$i],
                        ]);
                    }
                }
            }
        }

        return redirect()->route('cursos.index');
    }
    public function delete(Curso $curso)
    {
        $this->deleteAsig($curso);
        $curso->delete();
        return redirect()->route('cursos.index');
    }
    public function deleteAsig(Curso $curso)
    {
        foreach ($curso->asignaturas as $asignatura) {
            foreach ($asignatura->horarios as $horario){
                $horario->delete();
            }
            $titulo = $asignatura->titulo;
            $asignatura->delete(); 
            if($titulo->asignaturas->isEmpty()){
                $titulo->delete();
            }
        }
    }
}
