<?php

namespace App\Http\Controllers;

use App\Bus;
use App\FotoBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FotoBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fotos = DB::table('foto_buses')->join('buses', 'buses.id', '=', 'foto_buses.idBus')->get();
        return response()->json([
            "fotos" => $fotos,
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
        $bus = Bus::find($request->idBus);
        $rutaFoto = public_path('FotoBuses/Bus'.$bus->id);
        foreach ( $request->file('foto') as $fotos){
            $urlFoto = 'bus/'.$bus->id.'.'.$fotos->extension();
            $fotos->move($rutaFoto, $urlFoto);
            $fotoBus = FotoBus::create([
                "foto" => $fotos,
                "idBus" => $bus->id,
                "idChofer" => $bus->idChofer,
                "idEmpresa" => $bus->idEmpresa
            ]);
        }
        return response()->json([
            "message" =>"Fotos Agregadas Correctamente",
            "fotosData" => [$fotoBus]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FotoBus  $fotoBus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fotos = DB::table('buses')
        ->join('foto_buses', 'foto_buses.idBus', '=', 'buses.id')
        ->where('foto_buses.idBus', '=', $id )
        ->get();
        return response()->json([
            "data" => $fotos,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FotoBus  $fotoBus
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoBus $fotoBus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FotoBus  $fotoBus
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $rutaFoto = public_path('/FotoBuses'.'/');
        $newFoto = FotoBus::find($id);
        $bus = Bus::find($request->idBus);
        foreach ( $request->file('foto') as $fotos){
            $urlFoto = time().'-bus'.$bus->id.'.'.$fotos->extension();
            $fotos->move($rutaFoto, $urlFoto);
            $newFoto->update([
                "foto" => $fotos,
                "idBus" => $bus->id,
                "idChofer" => $bus->idChofer,
                "idEmpresa" => $bus->idEmpresa
            ]);
        }
        return response()->json([
            "message" =>"Fotos Agregadas Correctamente",
            "fotosData" => $fotos
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FotoBus  $fotoBus
     * @return \Illuminate\Http\Response
     */
    public function destroy(FotoBus $fotoBus)
    {
        //
        $fotoBus->delete();
        return response()->json([
            "message" => "Foto Eliminada",
            "status"  => Response::HTTP_OK
        ], Response::HTTP_OK);

    }
}
