<?php

namespace App\Http\Controllers;

use App\Auxiliar;
use App\Boleto;
use App\Empresa;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoletoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boleto = Boleto::all();
        return response()->json([
            "data" => $boleto,
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
        $boleto = Boleto::create($request->all());
        return response()->json([
            "message" => "Boleto generado correctamente",
            "data" => $boleto,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $empresa = Empresa::findOrFail($id);
        $boleto = Boleto::find($id);
        return response()->json([
            "data" => $boleto,
            "empresa" =>$empresa,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function edit(Boleto $boleto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $boleto = Boleto::find($id);
        $boleto->update($request->all());
        return response()->json([
            "message" => "Boleto actualizado correctamente",
            "data" => $boleto,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boleto $boleto)
    {
        //
        $boleto->delete();
        return response()->json([
            "message" => "Boleto eliminado Correctamente",
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
