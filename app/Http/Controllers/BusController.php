<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Butaca;
use App\Chofer;
use App\Empresa;
use App\FotoBus;
use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buses = DB::table('buses')->join('chofers', 'chofers.id', '=', 'buses.idChofer')
        ->join('horarios', 'horarios.id' ,'=' , 'buses.idHorario')
        ->get();
        $chofer = DB::table('chofers')->join('personas','personas.id', '=', 'chofers.idPersona')->get();
        return response()->json([
            "BusesData" =>$buses,
            "ChoferData" =>$chofer,
            "status" =>Response::HTTP_OK
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
        //
        $bus = Bus::create([
            "estado" => $request->input('estado'),
            "patente" => $request->input('patente'),
            "marca" => $request->input('marca'),
            "modelo" => $request->input('modelo'),
            "numAsientos" => $request->input('numAsientos'),
            "revisionTecnica" => $request->input('revisionTecnica'),
            "idChofer" => $request->input('idChofer'),
            "idHorario" => $request->input('idHorario'),
            "idEmpresa" => $request->input('idEmpresa')
        ]);
        //rescartar foto de formulario
        $rutaFoto = public_path('FotoBuses/Bus'.$bus->id);
        $fotoArray = $request->file('foto');
        $fotosCant = count($fotoArray);
        for ($i=0; $i <$fotosCant ; $i++) { 
            $urlFoto = 'bus/'.$bus->id.'.'.$fotoArray[$i]->extension();
            $fotoArray[$i]->move($rutaFoto, $urlFoto);
            $fotos = FotoBus::create([
                //"estado" => $request->input('estado'),
                "foto" => $fotoArray[$i],
                "idBus" => $bus->id,
                "idChofer" => $bus->idChofer,
                "idEmpresa" => $bus->idEmpresa
                ]);
        }
        $butaca = Butaca::create([
            "numero" => $request->input('numeroButacas'),
            "idBus" => $bus->id,
            "idChofer" => $bus->idChofer,
            "idEmpresa" => $bus->idEmpresa
        ]);
        return response()->json([
            "message" => "Nuevo Bus Registrado",
            "data" => $bus,
            "fotos" => $fotoArray,
            "Butacas" => $butaca, 
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);
        $chofer = Chofer::find($bus->idChofer);
        $empresa = Empresa::find($bus->idEmpresa);
        $horario = Horario::find($bus->idHorario);
        return response()->json([
            "busData" => $bus,
            "choferData" => $chofer,
            "empresaData" => $empresa,
            "horarioData" => $horario,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $bus = Bus::find($id);
        $bus->update([
            "estado" => $request->input('estado'),
            "patente" => $request->input('patente'),
            "marca" => $request->input('marca'),
            "modelo" => $request->input('modelo'),
            "numAsientos" => $request->input('numAsientos'),
            "revisionTecnica" => $request->input('revisionTecnica'),
            "idChofer" => $request->input('idChofer'),
            "idHorario" => $request->input('idHorario'),
            "idEmpresa" => $request->input('idEmpresa')
        ]);
        /*$butaca = DB::table('users')([
            "numero" => $request->input('numeroButacas'),
            "idBus" => $bus->id,
            "idChofer" => $bus->idChofer,
            "idEmpresa" => $bus->idEmpresa
        ]);*/
        return response()->json([
            "message" => "Datos de bus actualizados",
            "data" => $bus, 
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
