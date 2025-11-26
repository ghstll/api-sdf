<?php

namespace App\Http\Controllers;

use App\Models\ActividadesGrupo;
use Illuminate\Http\Request;

class ActividadesGrupoController extends Controller
{
  public function index(){
    return ActividadesGrupo::all();
  }
  public function store(Request $request){
    $validated = $request->validate([
      "actividad_id" => "required",
      "grupo_id" => "required"
    ]);
    $actividad_grupo_asignacion = ActividadesGrupo::create($validated);
    return response()->json([
      "message" => "Actividad asignada a grupo con exito",
      "asignacion" => $actividad_grupo_asignacion
    ]);
  }
}
