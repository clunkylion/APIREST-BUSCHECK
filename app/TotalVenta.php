<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalBoleta extends Model
{
    //
    protected $fillable = [
        "totalVenta",
        "cantFrecuentes",
        "cantNormales",
        "cantEstudiantes",
        "cantTotalPasajeros",
        "idUsuario",
        "idChofer",
        "idBus",
        "idEmpresa",
        "idHorario"
    ];
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'idUsuario');
    }
    public function chofer()
    {
        return $this->belongsTo('App\Chofer', 'idChofer');
    }
    public function bus()
    {
        return $this->belongsTo('App\Bus', 'idBus');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Boletero', 'idEmpresa');
    }
}
