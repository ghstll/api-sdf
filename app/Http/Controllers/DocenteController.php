<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteController extends Controller{

  public function obtenerGruposDeDocente(string $id){
    $grupos = Grupo::where('docente_id',$id)->get();
    if(!$grupos) return response()->json(["message" => "No tienes grupos asignados todavia."],404);  
    return response()->json($grupos);
  }
  
}
