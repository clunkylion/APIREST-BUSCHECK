<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //campos llenables
    protected $fillable = [
        'rutAdmin',
        'nombreAdmin',
        'apellidoAdmin',
        'telefonoAdmin',
        'correoAdmin',
        'sexoAdmin',
        'fechaNacimiento',
        'nombreUsuario',
        'contraseñaAdmin',
        'ultimoInicioSesion',
        'estadoAdmin',
        'idEmpresa'
    ];
    public function empresa()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
}
