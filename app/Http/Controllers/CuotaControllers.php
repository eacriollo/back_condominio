<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //muestra todos los registros

        $cuotas = Cuota::orderBy('valor', 'asc' )->get();

        return response()->json($cuotas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            "valor" => "required|unique:cuotas"
        ]);

        //guardar cuota
        $cuotas = new Cuota();
        $cuotas->valor = $request->valor;
        $cuotas->estado = $request->estado;
        $cuotas->save();

        return response()->json(
            ['mensaje' => 'cuota gurdada'],
            200
        );
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
        $request->validate([
            "valor" => "required|unique:cuotas,valor,$id"
        ]);

        //guardar cuota
        $cuotas = Cuota::find($id);
        $cuotas->valor = $request->valor;
        $cuotas->estado = $request->estado;
        $cuotas->update();

        return response()->json(
            ['mensaje' => 'cuota actualizada'],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cuotas = Cuota::find($id);
        $cuotas->delete();
        return response()->json(["mensaje"=>"valor eliminado"], 200);
    }
}
