<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $fillable = [
        'titulo',
    ];
    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }
}
