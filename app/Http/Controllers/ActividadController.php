<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActividadRequest;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Actividad::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActividadRequest $request){
      $validated = $request->validated();
      $actividad = Actividad::create($validated);
      return response()->json([
        'message' => "Actividad creada con exito",
        "actividad" => $actividad
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $actividad = Actividad::find($id);
      if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"]);
      return response()->json($actividad);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreActividadRequest $request, string $id){
      $actividad = Actividad::find($id);
      if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"]);

      $validated = $request->validated();
      $actividad->update($validated);
      return response()->json([
        "message" => "Actividad actualizada con exito",
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $actividad = Actividad::find($id);
      if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"]);
      $actividad->delete();
      return response()->json(["message" => "Actividad eliminada con exito"]);
    }
}
