<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Docente extends Model
{
    protected $fillable = [
        'nombre',
        'cedula',
        'fecha_ingreso',
    ];
    public function getFechaIngresoAttribute($date){
        if(isset($date))
        return new Date($date);
    }
}
