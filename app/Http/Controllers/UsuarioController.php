<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = DB::table('usuarios')->join('personas', 'personas.id', '=', 'usuarios.idPersona')->get();
        return response()->json([
            "message" => "Lista de Usuarios",
            "Data" => $usuarios,
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
        $usuario = Usuario::create([
            "nombreUsuario" => $request->input('nombreUsuario'),
            "contraseña" => Hash::make($request->input('password')),
            "ultimoInicioSesion" => $request->input('ultimaSesion'),
            "estadoUsuario" => $request->input('estado'),
            "idEmpresa" => $request->input('idEmpresa'),
            "idPersona" => $persona->id
        ]);
        return response()->json([
            "message" => "Usuario creado correctamente",
            "data" => $usuario,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuario = DB::table('usuarios')
        ->join('personas', 'personas.id', '=', 'usuarios.idPersona')
        ->where('usuarios.id', '=', $id)->get();
        return response()->json([
            "data" => $usuario,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $usuario = Usuario::find($id);
        $idPersona = $usuario->idPersona;
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
        $usuario->update([
            "nombreUsuario" => $request->input('nombreUsuario'),
            "contraseña" => $request->input('password'),
        ]);
        return response()->json([
            "message" => "Usuario actualizado correctamente",
            "data" => $usuario,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
        $usuario->delete();
        return response()->json([
            "message" => "Usuario eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
