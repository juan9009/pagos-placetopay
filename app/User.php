<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ddTipoIdentificacion',
        'txtNumeroIdentificacion',
        'txtNombre',
        'txtNumeroCelular',
        'txtDireccion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function infoSession()
    {
        return self::where('email', session('email'))->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoidentificacion()
    {
        return $this->belongsTo(\App\TipoIdentificacion::class, 'ddTipoIdentificacion');
    }
}
