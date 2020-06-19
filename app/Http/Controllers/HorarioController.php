<?php

namespace App\Http\Controllers;

use App\Destino;
use App\Horario;
use App\Origen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $horarios = DB::table('horarios')->join('origens', 'origens.id', '=', 'horarios.idOrigen')
        ->join('destinos', 'destinos.id', '=', 'horarios.idDestino')->get();
        return response()->json([
            "message" => "Lista de Horarios",
            "data" => $horarios,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
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
        $origen = Origen::create([
            "terminal" => $request->input('terminalOrigen'),
            "ciudad" => $request->input('ciudadOrigen')
        ]);
        $destino = Destino::create([
            "terminal" => $request->input('terminalDestino'),
            "ciudad" => $request->input('ciudadDestino')
        ]);
        $horario = Horario::create([
            "fecha" => $request->input('fecha'),
            "hora" => $request->input('hora'),
            "idOrigen" => $origen->id,
            "idDestino" => $destino->id,
        ]);
        return response()->json([
            "message" => "Horario de Recorrido Creado",
            "data" => $horario, 
            "Origen" => $origen, 
            "Destino" => $destino, 
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = DB::table('horarios')
        ->join('origens', 'origens.id', '=', 'horarios.idOrigen')
        ->join('destinos', 'destinos.id', '=', 'horarios.idDestino')
        ->where('horarios.id', '=', $id)->get();
        return response()->json([
            "data" => $horario,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $horario = Horario::find($id);
        $idOrigen = $horario->idOrigen;
        $idDestino = $horario->idDestino;
        $origen = Origen::find($idOrigen);
        $destino = Destino::find($idDestino);
        $origen->update([
            "terminal" => $request->input('terminalOrigen'),
            "ciudad" => $request->input('ciudadOrigen')
        ]);
        $destino->update([
            "terminal" => $request->input('terminalDestino'),
            "ciudad" => $request->input('ciudadDestino')
        ]);
        $horario->update([
            "fecha" => $request->input('fecha'),
            "hora" => $request->input('hora'),
            "idOrigen" => $origen->id,
            "idDestino" => $destino->id,
        ]);
        return response()->json([
            "message" => "Horario de Recorrido Actualizado",
            "data" => $horario, 
            "Origen" => $origen, 
            "Destino" => $destino, 
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
