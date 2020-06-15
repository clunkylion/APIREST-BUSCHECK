<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    //
    protected $fillable = [
        "precio",
        "numeroSerie",
        "idBoletero",
        "idAuxiliar",
        "idEmpresa"
    ];
    public function boletero()
    {
        return $this->belongsTo('App\Boletero', 'idBoletero');
    }
    
    public function auxiliar()
    {
        return $this->belongsTo('App\Auxiliar', 'idAuxiliar');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Boletero', 'idEmpresa');
    }
}
