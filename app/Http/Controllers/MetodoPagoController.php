<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $metodo = MetodoPago::orderby('tipo', 'asc')->get();

        return response()->json($metodo, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            "tipo" => "required|unique:metodo_pagos"
        ]);

        $metodo = new MetodoPago();
        $metodo->tipo = $request->tipo;
        $metodo->save();

        return response()->json(["mensaje" => "metodo registrado"]);
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
            "tipo" => "required|unique:metodo_pagos,tipo,$id"
        ]);

        $metodo = MetodoPago::find($id);
        $metodo->tipo = $request->tipo;
        $metodo->update();

        return response()->json(["mensaje" => "metodo registrado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $metodo = MetodoPago::find($id);
        $metodo->delete();
        return response()->json(["mensaje" => "metodo eliminado"]);
    }
}
