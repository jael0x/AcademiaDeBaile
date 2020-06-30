<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Administración';
        $imgprincipal = Image::find(1);
        $imgcursos = Image::find(2);
        $imgnotievens = Image::find(3);
        return view('admin.index', compact('title', 'imgprincipal', 'imgcursos', 'imgnotievens'));
    }
    public function update(){
        $data = request();

        if($data['imgprincipal']){
                //Hosting
            // $path = '/storage/app/public/'.$data->file('imgprincipal')->storeAs(
                //Local
            $path = '/storage/'.$data->file('imgprincipal')->storeAs(
            'principal',
            time() . '_principal'.'.'.$data['imgprincipal']->getClientOriginalExtension(),
            'public'
            );
            $imgprincipal = Image::find(1);
            $imgprincipal->update(['url' => $path]); 
        }

        if($data['imgcursos']){
                //Hosting
            // $path = '/storage/app/public/'.$data->file('imgcursos')->storeAs(
                //Local
            $path = '/storage/'.$data->file('imgcursos')->storeAs(
            'cursos',
            time() . '_cursos'.'.'.$data['imgcursos']->getClientOriginalExtension(),
            'public'
            );
            $imgcursos = Image::find(2);
            $imgcursos->update(['url' => $path]); 
        }

        if($data['imgnotievens']){
                //Hosting
            // $path = '/storage/app/public/'.$data->file('imgnotievens')->storeAs(
                //Local
            $path = '/storage/'.$data->file('imgnotievens')->storeAs(
            'notievens',
            time() . '_notievens'.'.'.$data['imgnotievens']->getClientOriginalExtension(),
            'public'
            );
            $imgnotievens = Image::find(3);
            $imgnotievens->update(['url' => $path]); 
        }

        return redirect()->route('admin');
    }
}
