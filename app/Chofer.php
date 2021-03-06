<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    //
    protected $fillable = [
        "estadoChofer",
        "idEmpresa",
        "idPersona",

    ];
    public function empresa()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
    public function persona()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Persona', 'idPersona');
    }
}
