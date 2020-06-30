<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

class Image extends Model
{
    protected $fillable = [
        'titulo',
        'url',
    ];
}
