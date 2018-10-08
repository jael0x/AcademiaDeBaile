<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Periodo extends Model
{
    protected $fillable = [
        'titulo',
        'mes_ini',
        'anio_ini',
        'mes_fin',
        'anio_fin'
    ];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }

    public function eventos(){
        return $this->hasMany(NotiEven::class);
    }

    public function getMesiAttribute(){
        $month = new Date(mktime(0, 0, 0, $this->mes_ini, 1));
        return $month->format('F');
    }

    public function getMesfAttribute(){
        $month = new Date(mktime(0, 0, 0, $this->mes_fin, 1));
        return $month->format('F');
    }
}
