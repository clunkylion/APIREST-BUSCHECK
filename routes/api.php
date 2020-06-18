<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//ruta para consultar por los administrador
Route::apiResource('/administradores', 'AdministradorController');
//ruta para consultar empresa
Route::apiResource('/empresa', 'EmpresaController');
//ruta para consultar boleto
Route::apiResource('/boleto', 'BoletoController');
//ruta para consultar cliente
Route::apiResource('/cliente', 'ClienteController');
//ruta para consultar usuario
Route::apiResource('/usuario', 'UsuarioController');
//ruta para consultar chofer
Route::apiResource('/chofer', 'ChoferController');
//ruta para consultar origer
Route::apiResource('/origen', 'OrigenController');
//ruta para consultar destino
Route::apiResource('/destino', 'DestinoController');
//ruta para consultar horario
Route::apiResource('/horario', 'HorarioController');
//ruta para consultar buses
Route::apiResource('/buses', 'BusController');


