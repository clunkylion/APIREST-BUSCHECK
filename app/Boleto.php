<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    //
    protected $fillable = [
        "precio",
        "numeroSerie",
        "idUsuario",
        "idEmpresa"
    ];
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'idUsuario');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Boletero', 'idEmpresa');
    }
}
