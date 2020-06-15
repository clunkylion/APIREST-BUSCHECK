<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //nos permite ver los datos guardados
    public function index()
    {
        //para retornar todos los administradores
        return Administrador::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
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


    //acá se almacena la información
    public function store(Request $request)
    {
        //almacenar un administrador
        //se crean con lo que trae request;
        $admin = Administrador::create($request->all());
        return $admin;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se muestra por identificador
    public function show(Administrador $administrador)
    {
        // 
        return $administrador;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se ocupa para editar
    public function update(Request $request, Administrador $administrador)
    {
        //
        $administrador->update($request->all());
        return $administrador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    //acá se eliminan los datos
    public function destroy(Administrador $administrador)
    {
        //
        $administrador->delete();
        return $administrador;
    }
}
