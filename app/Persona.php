<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $fillable = [
        "nombreUsuario",
        "contraseña",
        "ultimoInicioSesion",
        "estadoAdmin",
        "idEmpresa",
        "idPersona"
    ];
    public function empresa()
    {
        //relacion uno a muchos, una usuario tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
    public function persona()
    {
        //    el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Persona', 'idPersona');
    }
}
