<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $fillable = [
        "nombreEmpresa",
        "direccionEmpresa",
        "ciudadEmpresa",
        "telefonoEmpresa",
        "correoEmpresa"
    ];
}
