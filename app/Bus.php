<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    protected $fillable = [
        "estado",
        "patente",
        "marca",
        "modelo",
        "numAsientos",
        "revisionTecnica",
        "idChofer",
        "idHorario",
        "idEmpresa"
    ];
    public function chofer()
    {
        return $this->belongsTo('App\Chofer', 'idChofer');
    }
    public function horario()
    {
        return $this->belongsTo('App\Horario', 'idHorario');
    }

    public function empresa()
    {
        //relacion uno a muchos, una administrador tiene una empresa y una empresa muchos admin
        //                      el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Chofer', 'idEmpresa');
    }

}
