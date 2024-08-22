<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use Illuminate\Http\Request;

class DatosControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Dato::get();

        return response()->json($datos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate(
            [
                "nombre" => "required|unique:datos"
            ]
        );
        //guardar

        $datos = new Dato();
        $datos->nombre = $request->nombre;
        $datos->direccion = $request->direccion;
        $datos->ruc = $request->ruc;
        $datos->telefono = $request->telefono;
        $datos->imagen = $request->imagen;
        $datos->save();

        return response()->json(["mensaje" => "Datos ingresados", $datos], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar
        $request->validate(
            [
                "nombre" => "required|unique:datos,nombre,$id"
            ]
        );
        //guardar

        $datos = Dato::find($id);
        $datos->nombre = $request->nombre;
        $datos->direccion = $request->direccion;
        $datos->ruc = $request->ruc;
        $datos->telefono = $request->telefono;
        $datos->imagen = $request->imagen;
        $datos->update();

        return response()->json(["mensaje" => "Datos actualizados"], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
