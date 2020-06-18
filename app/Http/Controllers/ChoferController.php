<?php

namespace App\Http\Controllers;

use App\Chofer;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //inner joir con elocuent 
        //seleciona la tabla chofers y hace el inner join en la tabla personas cuando
        //el id de la persona sea igual al idPersona de la tabla Chofers
        $chofer = DB::table('chofers')->join('personas','personas.id', '=', 'chofers.idPersona')->get();
        return response()->json([
            "data" => $chofer,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $persona = Persona::create([
            "rut" => $request->input('rut'),
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "telefono" => $request->input('telefono'),
            "correo" => $request->input('correo'),
            "sexo" => $request->input('sexo'),
            "fechaNacimiento" => $request->input('fechaNacimiento'),
            "tipoPersona" => $request->input('tipoPersona')
        ]);
        $chofer = Chofer::create([
            "estadoChofer" => $request->input('estado'),
            "idEmpresa" => $request->input('idEmpresa'),
            "idPersona" => $persona->id
        ]);

        return response()->json([
            "message" => "Chofer creado correctamente",
            "data" => $chofer,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chofer = Chofer::find($id);
        $idPersona = $chofer->idPersona;
        $persona = Persona::find($idPersona);
        return response()->json([
            "PersonaData" => $persona,
            "ChoferData" => $chofer,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function edit(Chofer $chofer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update($id ,Request $request)
    {
        //
        $chofer = Chofer::find($id);
        $idPersona = $chofer->idPersona;
        $persona = Persona::find($idPersona);
        $persona->update([
            "rut" => $request->input('rut'),
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "telefono" => $request->input('telefono'),
            "correo" => $request->input('correo'),
            "sexo" => $request->input('sexo'),
            "fechaNacimiento" => $request->input('fechaNacimiento'),
            "tipoPersona" => $request->input('tipoPersona') 
        ]);
        $chofer->update([
            "estadoChofer" => $request->input('estado'),
        ]);
        return response()->json([
            "message" => "Chofer actualizado correctamente",
            "data" => $chofer,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chofer $chofer)
    {
        //
    }
}
