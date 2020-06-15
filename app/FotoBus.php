<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoBus extends Model
{
    //
    protected $fillable = [
        "estado",
        "foto",
        "idBus",
        "idChofer",
        "idEmpresa"
    ];
    public function bus()
    {
        return $this->belongsTo('App\Bus', 'idBus');
    }
    public function chofer()
    {
        return $this->belongsTo('App\Bus', 'idChofer');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Bus', 'idEmpresa');
    }
}
