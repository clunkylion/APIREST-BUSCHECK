<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Butaca extends Model
{
    //
    protected $fillable = [
        //"estado",
        "numero",
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
