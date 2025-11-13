<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRespuestaRequest;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Respuesta::all();
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
    public function store(StoreRespuestaRequest $request)
    {
      $validated = $request->validated();
      $respuesta = Respuesta::create($validated);
      return response()->json([
        'message' => 'Respuesta creada con exito',
        'entidad' => $respuesta
      ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $respuesta = Respuesta::find($id);
        if(!$respuesta) return response()->json(["message" => "No se encontro ninguna respuesta con el ID : {$id}"]);
        return response()->json($respuesta);
      }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRespuestaRequest $request, string $id)
    {
      $respuesta = Respuesta::find($id);
      if(!$respuesta){
        return response()->json([
          "message" => "No se encontro ninguna respuesta con el ID : {$id}"
        ]);
      }
      $validated = $request->validated();
      $respuesta->update($validated);
      return response()->json([
        "message" => "Respuesta actualizada con exito",
      ]);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $respuesta = Respuesta::find($id);
      if(!$respuesta) return response()->json(["message" => "No se encontro nignuna respuesta con el ID : {$id}"]);
      $respuesta->delete();
      return response()->json(["message"=>"Respuesta eliminada con exito"]);
    }
}
