<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
        "tipoCliente",
        "idPersona"
    ];
    public function persona()
    {
        //    el modelo al que se relaciona , y el campo
        return $this->belongsTo('App\Persona', 'idPersona');
    }
}
