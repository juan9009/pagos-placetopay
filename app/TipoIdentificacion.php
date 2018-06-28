<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    public $table = 'tiposdocumento';

    public $fillable = [
        'id',
        'descripcion',
    ];
}
