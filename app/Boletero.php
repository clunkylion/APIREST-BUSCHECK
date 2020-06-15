<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletero extends Model
{
    //
    protected $fillable = [
        "rutBoletero",
        "nombreBoletero",
        "apellidoBoletero",
        "telefonoBoletero",
        "correoBoletero",
        "sexoBoletero",
        "fechaNacimiento",
        "nombreUsuario",
        "contraseñaBoletero",
        "ultimoInicioSesion",
        "idEmpresa"
    ];
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
}
