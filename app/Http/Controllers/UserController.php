<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Administradores';
        $users = User::all();
        return view('user.index', compact('title', 'users'));
    }
    // public function create()
    // {
    //     $title = 'Registrar Administrador';
    //     return view('user.create', compact('title'));
    // }
    // public function store()
    // {
    //     $data = request()->validate([
    //         'nombre' => 'required',
    //         'cedula' => 'required | min:10 | max:10',
    //         'fecha_ingreso' => 'required',
    //     ],[
    //         'nombre.required' => 'Ingrese un nombre',
    //         'cedula.required' => 'Ingrese una cedula',
    //         'cedula.min' => 'La cédula debe tener 10 caracteres',
    //         'cedula.max' => 'La cédula debe tener 10 caracteres',
    //         'fecha_ingreso.required' => 'La fecha de ingreso es necesaria',
    //     ]);

    //     Docente::create([
    //         'nombre' => $data['nombre'],
    //         'cedula' => $data['cedula'],
    //         'fecha_ingreso' => $data['fecha_ingreso'],
    //     ]);

    //     return redirect()->route('docentes.index');
    // }
    public function detail(User $user)
    {
        $title = 'Mostrar Administrador';
        return view('user.detail', compact('title', 'user'));
    }
    // public function edit(Docente $docente)
    // {
    //     $title = 'Editar Docente';
    //     return view('docente.edit', compact('title', 'docente'));
    // }
    // public function update(Docente $docente)
    // {
    //     $data = request()->validate([
    //         'nombre' => 'required',
    //         'cedula' => 'required | min:10 | max:10',
    //         'fecha_ingreso' => 'required',
    //     ],[
    //         'nombre.required' => 'Ingrese un nombre',
    //         'cedula.required' => 'Ingrese una cedula',
    //         'cedula.min' => 'La cédula debe tener 10 caracteres',
    //         'cedula.max' => 'La cédula debe tener 10 caracteres',
    //         'fecha_ingreso.required' => 'La fecha de ingreso es necesaria',
    //     ]);
        
    //     $docente->update($data);

    //     return redirect()->route('docentes.index');
    // }
    public function delete(User $user)
    {
        if(auth()->user() != $user){
            $user->delete();
        } 
        return redirect()->route('users.index');
    }
}
