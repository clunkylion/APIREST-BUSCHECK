<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Administrador;
use App\Persona;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            "nombreUsuario" => "required",
            "clave" => "required"
        ]);
        $admin = Administrador::where('nombreUsuario', $request->nombreUsuario)->first();
        $usuario = Usuario::where('nombreUsuario', $request->nombreUsuario)->first();
        if ($admin) {
           if (Hash::check($request->clave, $admin->contraseña)) {
               
               $token = $admin->createToken('Admin Token')->accessToken;
               if ($token) {
                    return response()->json([
                        "Message" => "Bienvenid@ ".$admin->nombreUsuario ,
                         "Token" => $token], 200);
                }else{
                    return response()->json("Error en el Login", 401);
                }
           }else{
               return response()->json(['Error' => 'Contraseña o Nombre de Administrador incorrecto'], 422);
           }
        }elseif ($usuario) {

            if (Hash::check($request->clave, $usuario->contraseña)) {
                $token = $usuario->createToken('Usuario Token')->accessToken;
                if ($token) {
                     return response()->json([
                         "Message" => "Bienvenid@ ".$usuario->nombreUsuario ,
                          "Token" => $token], 200);
                 }else{
                     return response()->json("Error en el Login", 401);
                 }
            }else{
                return response()->json(['Error' => 'Contraseña o Nombre de usuario incorrecto'], 422);
            }
        }else{
            return response()->json(['Error' => 'Sus datos no existen'], 422);
        }
        
    }
    public function signUp(Request $request){
        $request->validate([
            "rut" => "required | min:10",
            "nombre" => "required",
            "apellido" => "required",
            "telefono" => "required",
            "correo" => "required | email",
            "sexo" => "required",
            "fechaNacimiento" => "required",
            "tipoPersona" => "required",
            "nombreUsuario" => "required",
            "password" => "required",
            "ultimaSesion" => "required",
            "estado" => "required",
        ]);
        $persona = Persona::create([
            "rut" => $request->rut,
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "sexo" => $request->sexo,
            "fechaNacimiento" => $request->fechaNacimiento,
            "tipoPersona" => $request->tipoPersona
        ]);
        if ($request->input('tipoDeUsuario') == 'Administrador') {
            $admin = Administrador::create([
            "nombreUsuario" => $request->nombreUsuario,
            "contraseña" => Hash::make($request->password),
            "ultimoInicioSesion" => $request->ultimaSesion,
            "estadoAdmin" => $request->estado,
            "idEmpresa" => $request->input('idEmpresa'),
            "idPersona" => $persona->id
            ]);
            return response()->json([
                "message" => "Administrador creado correctamente",
                "data" => $admin,
                "status" => Response::HTTP_OK
            ],Response::HTTP_OK);
        }elseif ($request->input('tipoDeUsuario') == 'Usuario'){
            $usuario = Usuario::create([
                "nombreUsuario" => $request->nombreUsuario,
                "contraseña" => Hash::make($request->password),
                "ultimoInicioSesion" => $request->$request->ultimaSesion,
                "estadoUsuario" => $request->estado,
                "idEmpresa" => $request->input('idEmpresa'),
                "idPersona" => $persona->id
            ]);
            return response()->json([
                "message" => "Usuario creado correctamente",
                "data" => $usuario,
                "status" => Response::HTTP_OK
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                "message" => "Error al crear un Usuario",
                "status" => Response::HTTP_INTERNAL_SERVER_ERROR
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}

