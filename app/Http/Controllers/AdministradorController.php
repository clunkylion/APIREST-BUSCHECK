<?php

namespace App\Http\Controllers;

use App\Administrador;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //nos permite ver los datos guardados
    public function index()
    {
        //para retornar todos los administradores

        $administradores = DB::table('administradors')->join('personas', 'personas.id', '=', 'administradors.idPersona')->get();
        return response()->json([
            "data" => $administradores,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
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


    //acá se almacena la información
    public function store(Request $request)
    {
        //almacenar un administrador
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
        $admin = Administrador::create([
            "nombreUsuario" => $request->input('nombreUsuario'),
            "contraseña" => $request->input('password'),
            "ultimoInicioSesion" => $request->input('ultimaSesion'),
            "estadoAdmin" => $request->input('estadoAdmin'),
            "idEmpresa" => $request->input('idEmpresa'),
            "idPersona" => $persona->id
        ]);

        return response()->json([
            "message" => "Administrador creado correctamente",
            "data" => $admin,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se muestra por identificador
    public function show($id)
    {
        $admin =DB::table('administradors')
        ->join('personas', 'personas.id', '=' , 'administradors.idPersona')
        ->where('administradors.id', '=', $id)->get();
        return response()->json([
            "data" => $admin,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se ocupa para editar
    public function update($id, Request $request){
        $admin = Administrador::find($id);
        $idPersona = $admin->idPersona;
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
        $admin->update([
            "nombreUsuario" => $request->input('nombreUsuario'),
            "contraseña" => $request->input('password'),
            "estadoAdmin" => $request->input('estado')
        ]);
        return response()->json([
            "message" => "Administrador actualizado correctamente",
            "data" => $admin,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
        // $administrador->update($admin->all());
        // return $administrador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se eliminan los datos
    public function destroy(Administrador $administrador)
    {
        //
        $administrador->delete();
        return response()->json([
            "message" => "Administrador eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
