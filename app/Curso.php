<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'titulo',
        'edad_min',
        'edad_max',
        'periodo_id',
        'precio_inscripcion',
        'precio_mensual',
        'color_id',
    ];
    
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }
}
