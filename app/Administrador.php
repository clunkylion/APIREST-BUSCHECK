<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Administrador extends Authenticatable implements JWTSubject
{
    //HasApiTokens,
    use  Notifiable;
    //campos llenables
    protected $fillable = [
        "nombreUsuario",
        "contraseña",
        "ultimoInicioSesion",
        "estadoAdmin",
        "idEmpresa",
        "idPersona"
    ];
    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    public function empresa()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }
}
