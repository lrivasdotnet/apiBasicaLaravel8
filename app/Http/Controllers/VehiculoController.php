<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaVehiculos = Vehiculo::all();
        return $listaVehiculos;
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
        $objetoVehiculo = new Vehiculo([
            'marca' => $request->get("marca"),
            'modelo' => $request->get("modelo"),
            'anio' => $request->get("anio")
        ]);
        $objetoVehiculo->save();
        $arreglo["guardado"] = "ok";
        return json_encode($arreglo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $objetoVehiculo = Vehiculo::find($id);
        if ($objetoVehiculo == null) {
            $arreglo["mensaje"] = "Registro no encontrado";
            return json_encode($arreglo);
        } else {
            return $objetoVehiculo;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $objetoVehiculo = Vehiculo::find($id);
        $objetoVehiculo->marca = $request->get("marca");
        $objetoVehiculo->modelo = $request->get("modelo");
        $objetoVehiculo->anio = $request->get("anio");
        $objetoVehiculo->save();
        $arreglo["modificado"] = "ok";
        $arreglo["id_vehiculo"] = $id;
        return json_encode($arreglo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $objetoVehiculo = Vehiculo::findOrFail($id);
        $objetoVehiculo->delete();
        $arreglo["eliminado"] = "ok";
        $arreglo["id_vehiculo"] = $id;
        return json_encode($arreglo);
    }
}
