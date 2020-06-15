<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    //
    protected $fillable = [
        'rutAuxiliar',
        'nombreAuxiliar',
        'apellidoAuxiliar',
        'telefonoAuxiliar',
        'correoAuxiliar',
        'sexoAuxiliar',
        'fechaNacimiento',
        'nombreUsuario',
        'contraseñaAuxiliar',
        'ultimoInicioSesion',
        "idEmpresa"
    ];
    public function empresa()
    {
        //relacion uno a muchos, una auxiliar tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
}
