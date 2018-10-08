<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = [
        'titulo_id',
        'docente_id',
        'curso_id',
    ];

    public function titulo(){
        return $this->belongsTo(Titulo::class);
    }
    public function horarios(){
        return $this->hasMany(Horario::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }
}
