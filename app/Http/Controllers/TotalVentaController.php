<?php

namespace App\Http\Controllers;

use App\TotalVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TotalVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $totalVenta =  DB::table('total_ventas')
        ->join('chofers', 'chofers.id', '=', 'total_ventas.idChofer')
        ->join('buses', 'buses.id', '=', 'total_ventas.idBus')
        ->join('empresas', 'empresas.id', '=', 'total_ventas.idEmpresa')
        ->join('horarios', 'horarios.id', '=', 'total_ventas.idHorario')
        ->get();
        return response()->json([
            "data" => $totalVenta,
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
        $totalVenta = TotalVenta::create($request->all());
        return response()->json([
            "message" => "Total de venta creado",
            "data" => $totalVenta,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TotalVenta  $totalBoleta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $totalVenta =  DB::table('total_ventas')
        ->join('chofers', 'chofers.id', '=', 'total_ventas.idChofer')
        ->join('buses', 'buses.id', '=', 'total_ventas.idBus')
        ->join('empresas', 'empresas.id', '=', 'total_ventas.idEmpresa')
        ->join('horarios', 'horarios.id', '=', 'total_ventas.idHorario')
        ->where('total_ventas.id', '=', $id)
        ->get();
        return response()->json([
            "message" => "Total de Ventas: ".$id,
            "data" => $totalVenta,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
        
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TotalVenta  $totalBoleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TotalVenta $totalBoleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TotalVenta  $totalBoleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalVenta $totalBoleta)
    {
        //
    }
}
