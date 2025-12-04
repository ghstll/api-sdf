<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\AlumnoGrupo;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;

class AlumnoController extends Controller{
  
  public function asignarAGrupo(Request $request){
    $validated = $request->validate([
      "alumno_id" => "required",
      "grupo_id" => "required"
    ]);
    $alumno_id = $request->input('alumno_id');
    $grupo_id = $request->input('grupo_id');
    $alumno = User::where('rol','alumno')
                  ->where('id',$alumno_id)->first();
    if(!$alumno) return response()->json(["message" => "No se encontro el alumno con el id {$alumno_id}"],404);
    $grupo = Grupo::where('id',$grupo_id)->first();
    if(!$grupo) return response()->json(["message" => "No se encontro el grupo con el id {$grupo_id}"],404);
    $alumno_grupo_asignacion = AlumnoGrupo::create($request);
    return response()->json(["message" => "Alumno asignado al grupo con exito","asignacion" => $alumno_grupo_asignacion],200);
  }

  public function getAlumnosSinGrupo(){
    $alumnos_libres = User::where('rol','alumno')->whereDoesntHave('alumno_grupo')->get();
    return response()->json($alumnos_libres,200);
  }

  public function getAlumnosFromGrupo(string $id){
    $alumnos = User::where('rol', 'alumno')
    ->whereHas('alumno_grupo', function($q) use ($id) {
        $q->where('grupo_id', $id);
    })
    ->get();
    return response()->json($alumnos,200);
  }
  public function getGrupo($id){
    $alumno = User::find($id);
    if (!$alumno) {
      return response()->json(['message' => 'Alumno no encontrado'], 404);
    }
    $grupo = $alumno->grupoComoAlumno;
    if (!$grupo) {
      return response()->json(['message' => 'El alumno no tiene un grupo asignado'], 404);
    }
    return response()->json([
      'grupo' => $grupo
    ]);
  }

}