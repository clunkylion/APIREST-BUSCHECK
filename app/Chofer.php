<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    //
    protected $fillable = [
        'rutChofer',
        'nombreChofer',
        'apellidoChofer',
        'telefonoChofer',
        'correoChofer',
        'sexoChofer',
        'fechaNacimiento',
        'nombreUsuario',
        'contraseñaChofer',
        'ultimoInicioSesion',
        'idEmpresa'
    ];
    public function empresa()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
}
