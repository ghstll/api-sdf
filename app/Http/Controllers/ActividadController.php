<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActividadRequest;
use App\Models\Actividad;
use App\Models\ActividadesGrupo;
use App\Models\Grupo;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
      // return Actividad::all();
      $actividades = Actividad::with([
        'preguntas',
        'preguntas.respuestas'
      ])->get();
      return response()->json($actividades,200);    
    }
    
    public function store(StoreActividadRequest $request){
      $validated = $request->validated();
      $actividad = Actividad::create($validated);
      return response()->json([
        'message' => "Actividad creada con exito",
        "actividad" => $actividad
      ]);
    }
    
    // public function show(string $id){
    //   $actividad = Actividad::find($id);
    //   if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"]);
    //   return response()->json($actividad);
    // }
    
    public function show(string $id){
    $actividad = Actividad::with([
        'preguntas',
        'preguntas.respuestas',
    ])->findOrFail($id);
    return response()->json([
        'message' => 'Actividad obtenida correctamente',
        'actividad' => $actividad
    ]);
}
    public function update(StoreActividadRequest $request, string $id){
      $actividad = Actividad::find($id);
      if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"],404);

      $validated = $request->validated();
      $actividad->update($validated);
      return response()->json([
        "message" => "Actividad actualizada con exito",
        "actividad" => $actividad
      ]);
    }
    
    public function destroy(string $id)
    {
      $actividad = Actividad::find($id);
      if(!$actividad) return response()->json(["message"=> "No se encontro ninguna actividad con el ID : {$id}"]);
      $actividad->delete();
      return response()->json(["message" => "Actividad eliminada con exito"]);
    }
    //el id es el id del grupo
    public function actividadesGrupo(string $grupo_id){
    }
    
    // Obtener actividades por ID de docente
    public function getByDocenteId(string $docente_id){
      $actividades = Actividad::where('docente_id', $docente_id)->get();
      return $actividades;
    }
}
