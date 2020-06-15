<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $fillable = [
        "fecha",
        "hora",
        "idOrigen",
        "idDestino"
    ];
    public function origen()
    {
        return $this->belongsTo('App\Origen', 'idOrigen');
    }
    public function destino()
    {
        return $this->belongsTo('App\Destino', 'idDestino');
    }

}
