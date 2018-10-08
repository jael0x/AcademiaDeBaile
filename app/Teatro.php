<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teatro extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
    ];
}
