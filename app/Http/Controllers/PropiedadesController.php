<?php

namespace App\Http\Controllers;

use App\Models\Propiedade;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        // Variables
        $buscar = $request->q ?? '';  // Utiliza el operador de fusión null para simplificar
        $limit = $request->limit ?? 10;

        // Construcción de la consulta
        $query = Propiedade::orderBy('numero_unidad', 'asc')
            ->with([
                'persona' => function ($query) {
                    $query->select('id', 'nombre');
                },
                'cuota' => function ($query) {
                    $query->select('id', 'valor');
                }
            ]);

        // Aplicar búsqueda si es necesario
        if ($buscar) {
            $query->where('numero_unidad', 'like', '%' . $buscar . '%');
        }

        // Paginación
        $propiedades = $query->paginate($limit);

        return response()->json($propiedades, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar 
        $request->validate([
            "numero_unidad" => "required|unique:Propiedades",
            "ubicacion" => "required"
        ]);

        $propiedades = new Propiedade();
        $propiedades->numero_unidad = $request->numero_unidad;
        $propiedades->ubicacion = $request->ubicacion;
        $propiedades->id_personas = $request->id_personas;
        $propiedades->id_cuotas = $request->id_cuotas;
        $propiedades->save();

        return response()->json(["mensaje" => "Datos ingresado", 200]);
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
            "numero_unidad" => "required|unique:Propiedades,numero_unidad,$id",
            "ubicacion" => "required"
        ]);

        $propiedades = Propiedade::findOrFail($id);
        $propiedades->numero_unidad = $request->numero_unidad;
        $propiedades->ubicacion = $request->ubicacion;
        $propiedades->id_personas = $request->id_personas;
        $propiedades->id_cuotas = $request->id_cuotas;
        $propiedades->update();

        return response()->json(["mensaje" => "Datos actualizados", 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $propiedades = Propiedade::findOrFail($id);
        $propiedades->delete();

        return response()->json(["mensaje" => "Datos eliminados", 200]);
    }
}
