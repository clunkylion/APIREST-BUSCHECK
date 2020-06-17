<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $fillable = [
        "rut",
        "nombre",
        "apellido",
        "telefono",
        "correo",
        "sexo",
        "fechaNacimiento",
        "tipoPersona",
    ];

    
}
