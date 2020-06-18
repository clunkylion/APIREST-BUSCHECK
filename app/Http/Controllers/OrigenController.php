<?php

namespace App\Http\Controllers;

use App\Origen;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $origen = Origen::all();
        return response()->json([
            "data" =>$origen, 
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
        $origen = Origen::create($request->all());
        return response()->json([
            "message" => "Origen Creado Correctamente",
            "data" => $origen,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Origen  $origen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $origen = Origen::find($id);
        return response()->json([
            "data" => $origen,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Origen  $origen
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $origen = Origen::find($id);
        $origen->update($request->all());
        return response()->json([
            "message" => "Origen Actualizado Correctamente",
            "data" => $origen,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Origen  $origen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Origen $origen)
    {
        //
        $origen->delete();
        return response()->json([
            "message" => "Origen eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
