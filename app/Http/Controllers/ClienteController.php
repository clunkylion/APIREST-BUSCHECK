<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Persona;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cliente = Cliente::all();
        return response()->json([
            "data" => $cliente,
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
        $cliente = Cliente::create([
            "tipoCliente" => $request->input('tipoCliente'),
            "idPersona" => $persona->id
        ]);

        return response()->json([
            "message" => "Cliente creado correctamente",
            "data" => $cliente,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente = Cliente::find($id);
        return response()->json([
            "data" => $cliente,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $cliente = Cliente::find($id);
        $idPersona = $cliente->idPersona;
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
        $cliente->update([
            "tipoCliente" => $request->input('tipoCliente')
        ]);
        return response()->json([
            "message" => "Cliente actualizado correctamente",
            "data" => $cliente,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
