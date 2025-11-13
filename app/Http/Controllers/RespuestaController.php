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
    public function store(StoreRespuestaRequest $request)
    {
      $validated = $request->validated();
      $respuesta = Respuesta::create($validated);
      return response()->json([
        'message' => 'Respuesta creada con exito',
        'entidad' => $respuesta
      ]);
    }
    public function show(string $id){
        $respuesta = Respuesta::find($id);
        if(!$respuesta) return response()->json(["message" => "No se encontro ninguna respuesta con el ID : {$id}"]);
        return response()->json($respuesta);
      }
    public function edit(string $id){
      
    }

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
  
    public function destroy(string $id)
    {
      $respuesta = Respuesta::find($id);
      if(!$respuesta) return response()->json(["message" => "No se encontro nignuna respuesta con el ID : {$id}"]);
      $respuesta->delete();
      return response()->json(["message"=>"Respuesta eliminada con exito"]);
    }
}
