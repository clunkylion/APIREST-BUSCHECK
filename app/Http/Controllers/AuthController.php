<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Administrador;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
       
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
               return response()->json(['Error' => 'Contraseña o Nombre de usuario incorrecto'], 422);
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
}

/*
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    //
    public function login(){
        $data = [
            'email' => request('email'),
            'password' => request('email')
        ];
        if (Auth::attempt($data)) {
            $user = Auth::User();
            $logginData['token'] = $user->createToken('auth-token')->accessToken;
            return response()->json("Bienvenido", Response::HTTP_OK);
        }else{
            return response()->json("Error", 401);
        }
    }
}
