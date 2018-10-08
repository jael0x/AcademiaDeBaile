<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'titulo',
        'color1',
        'color2',
    ];
}
