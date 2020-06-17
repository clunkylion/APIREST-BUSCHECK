<?php

namespace App\Http\Controllers;

use App\Auxiliar;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $auxiliar = Auxiliar::all();
        return response()->json([
            "data" => $auxiliar,
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
        $auxiliar = Auxiliar::create($request->all());
        return response()->json([
            "message" => "Auxiliar creado correctamente",
            "data" => $auxiliar,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $auxiliar = Auxiliar::find($id);
        return response()->json([
            "data" => $auxiliar,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function edit(Auxiliar $auxiliar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $auxiliar = Auxiliar::find($id);
        $auxiliar->update($request->all());
        return response()->json([
            "message" => "Auxiliar actualizado correctamente",
            "data" => $auxiliar,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Auxiliar $auxiliar)
    {
        //
        $auxiliar->delete();
        return response()->json([
            "message" => "Auxiliar eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
