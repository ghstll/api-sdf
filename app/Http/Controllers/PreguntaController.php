<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreguntaRequest;
use App\Models\Pregunta;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PreguntaController extends Controller{
  public function index(){
      return Pregunta::all();
  }
  public function store(StorePreguntaRequest $request){
      $validated = $request->validated();
      $pregunta  = Pregunta::create($validated);
      return response()->json(
        ["message" => "Pregunta creada con exito",
        "pregunta" => $pregunta
      ]);
  }
  public function show(string $id){
    $pregunta = Pregunta::find($id);
    if(!$pregunta) return response()->json(["message" => "No se encontro ninguna "]);
    return response($pregunta);
  }
  public function update(StorePreguntaRequest $request, string $id){
    $pregunta = Pregunta::find($id);
    if(!$pregunta) return response()->json(["message" => "No se encontro ninguna pregunta con el ID : {$id}"]);
    $validated = $request->validated();
    $pregunta->update($validated);
    return response()->json(["message" => "Pregunta actualizada con exito"]);
  }
  public function destroy(string $id){
    $pregunta = Pregunta::find($id);
    if(!$pregunta) return response()->json(["message" => "No se encontro ninguna pregunta con el ID : {$id}"]);
    $pregunta->delete();
    return response()->json(["message"=> "Pregunta eliminada con exito"]);
  }
  public function obtenerPreguntasDeActividad(string $id){
  }
}
