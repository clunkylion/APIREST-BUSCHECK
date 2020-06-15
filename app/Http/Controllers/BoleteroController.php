<?php

namespace App\Http\Controllers;

use App\Boletero;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoleteroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boletero = Boletero::all();
        return response()->json([
            "data" => $boletero,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

   
    public function store(Request $request)
    {
        //
        $boletero = Boletero::create($request->all());
        return response()->json([
            "message" => "Boletero creado correctamente",
            "data" => $boletero,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boletero  $boletero
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $boletero = Boletero::find($id);
        return response()->json([
            "data" => $boletero,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boletero  $boletero
     * @return \Illuminate\Http\Response
     */
    public function edit(Boletero $boletero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boletero  $boletero
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $boletero = Boletero::find($id);
        $boletero->update($request->all());
        return response()->json([
            "message" => "Boletero actualizado correctamente",
            "data" => $boletero,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boletero  $boletero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boletero $boletero)
    {
        //
        $boletero->delete();
        return response()->json([
            "message" => "Boletero eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
