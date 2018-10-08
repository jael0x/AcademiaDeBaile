<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'asignatura_id',
        'dia',
        'hora_ini',
        'hora_fin',
    ];

    public function getStrdiaAttribute(){
        switch ($this->dia) {
            case '1':
                return 'Lunes';
                break;
            case '2':
                return 'Martes';
                break;
            case '3':
                return 'Miércoles';
                break;
            case '4':
                return 'Jueves';
                break;
            case '5':
                return 'Viernes';
                break;
            case '6':
                return 'Sábado';
                break;
            case '7':
                return 'Domingo';
                break;
        }
    }
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
}
