<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class NotiEven extends Model
{
    protected $fillable = [
        'titulo',
        'tipo_id',
        'fecha',
        'descripcion',
        'img_url',
        'teatro_id',
        'fecha_eve',
        'hora_eve',
        'precio',
        'docente_id',
        'periodo_id',
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
    public function teatro(){
        return $this->belongsTo(Teatro::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }
    public function getFechaEveAttribute($date){
        if(isset($date))
        return new Date($date);
    }
}
