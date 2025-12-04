<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnosGrupo;
use App\Models\AlumnoGrupo;
use Illuminate\Http\Request;

class AlumnosGrupoController extends Controller
{
    public function asignarAlumnoAGrupo(StoreAlumnosGrupo $request){
      $validated = $request->validated();
      $asignacion = AlumnoGrupo::create($validated);
      return response()->json([
        "message" => "Alumno asignado al grupo con exito.",
        "asignacion" => $asignacion
      ],200);
    }
}
