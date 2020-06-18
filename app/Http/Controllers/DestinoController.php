<?php

namespace App\Http\Controllers;

use App\Destino;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $destino = Destino::all();
        return response()->json([
            "data" =>$destino, 
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK );
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
        $destino = Destino::create($request->all());
        return response()->json([
            "message" => "Destino Creado Correctamente",
            "data" => $destino,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destino = Destino::find($id);
        return response()->json([
            "data" => $destino,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function edit(Destino $destino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $destino = Destino::find($id);
        $destino->update($request->all());
        return response()->json([
            "message" => "Destino Actualizado Correctamente",
            "data" => $destino,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destino $destino)
    {
        //
        $destino->delete();
        return response()->json([
            "message" => "Destino eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
