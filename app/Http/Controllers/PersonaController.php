<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //muestra todos los datos
        $personas = Persona::get();

        return response()->json($personas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate(
            [
                "nombre" => "required|unique:personas"
            ]
        );
        $personas = new Persona();
        $personas->nombre = $request->nombre;
        $personas->telefono = $request->telefono;
        $personas->save();

        return response()->json(["mensaje" => "guardado"], 200);
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
                "nombre" => "required|unique:personas,nombre,$id"
            ]
        );
        $personas = Persona::find($id);
        $personas->nombre = $request->nombre;
        $personas->telefono = $request->telefono;
        $personas->save();

        return response()->json(["mensaje" => "actualizado"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $personas = Persona::find($id);
        $personas->delete();

        return response()->json(["mensaje" => "se elimino persona"], 200);
    }
}
