<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoRequest;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;

class GrupoController extends Controller{
    public function index(){
        return Grupo::all();
    }

    public function store(Request $request){
      $validatedData = $request->validate(["nombre" => "required|string"]);
      $grupo = Grupo::create($validatedData);
      return response()->json(["message" => "Grupo creado con exito", "grupo" => $grupo]);
    }

    
    public function show(string $id){
      $grupo = Grupo::find($id);
      if(!$grupo) return response()->json(["message"=>"No se encontro ningun grupo con el ID : {$id}"]);
      return response()->json($grupo);
      }

    public function update(StoreGrupoRequest $request, string $id){
      $grupo = Grupo::find($id);
      if(!$grupo) return response()->json(["message" => "No se encontro ningun grupo con el ID : {$id}"]);
      $validated = $request->validated();
      $grupo->update($validated);
      return response()->json(["message"=>"Grupo actualizado con exito."]);
    }

    public function destroy(string $id){
      $grupo = Grupo::find($id);
      if(!$grupo) return response()->json(["message" => "No se encontro ningun grupo con el ID : {$id}"]);
      $grupo->delete();
      return response()->json(["message" => "Grupo eliminado con exito."]);
    }
    public function create(Request $request){
      $validated = $request->validate([
        'nombre' => 'required|max:3',
        'docente' => 'sometimes'
      ]);
      $grupo = Grupo::create($validated);
      return response()->json(['message' => "Grupo creado con extio ", 'grupo' => $grupo],200);
    }

    //Esta funcion va a asingarle un docente a un grupo
    //recibira como parametro
    
    public function asignarDocenteAGrupo(Request $request){
      
      //guardamos los campos del request body en las siguientes variables
      $grupo_id = $request->input('grupo_id'); 
      $docente_id = $request->input('docente_id');
      
      //verificamos que las dos variables tengan algun valor y que no sean nulas
      if(!$grupo_id || !$docente_id) return response()->json(['message' => 'No se encontro el id del grupo o del docente en la request , favor de pasar todos los campos'],400);
      
      //obtenemos el grupo por el id (grupo_id)
      $grupo = Grupo::find($grupo_id);

      //verificamos que $grupo realmente tenga algun valor, si no lo tiene es por que no encontro ningun grupo con dicho id
      if(!$grupo) return response()->json(['message' => "No se encontro el grupo con el ID {$grupo_id}"],404);
      
      //Verificamos si el grupo ya tiene un docente asignado.
      // Si ya tiene un docente asignado lo primero que tenemos que hacer
      // es utilizar la funcion removerDocenteDeGrupo() primero si queremos asignar a
      // un nuevo docente
      
      if($grupo->docente_id != null) return response()->json(['message' => 'Este grupo ya tiene un docente asignado, si quieres asignar un nuevo docente primero quita al anterior.'],200);
      
      //Guardamos el docente en $docente
      $docente = User::where('id',$docente_id)
                      ->where('rol','docente')->first();
    
      if(!$docente) return response()->json(['message' => "No se encontro el docente con el ID {$grupo_id}"],404);
      $grupo->docente_id = $docente_id;
      $grupo->save(); // despues de asignar el nuevo docente guardamos los cambios
    
      return response()->json(['message' => "El docente con el Id {$docente_id} fue asignado al grupo con Id {$grupo_id}","grupo" => $grupo],200);    
      
    }
   
    //Esta funcion recibira como parametro el id de un grupo, si encuentra el grupo con dicho id
    //removera el docente que tenga actualmente asignado ese grupo
    
    public function removerDocenteDeGrupo(string $id){
      $grupo = Grupo::find($id);
      if(!$grupo) return response()->json(["message" => "No se encontro a ningun grupo con el Id {$id}"],404);
      if(!$grupo->docente_id) return response()->json(["message" => "Este grupo aun no tiene asignado ningun docente"],400);
      $grupo->docente_id = null;
      $grupo->save();
      return response()->json(["message" => "Docente removido del grupo con exito"],200);
    }
    public function gruposDeDocente(string $docente_id){
      $grupos = Grupo::where('docente_id',$docente_id)->get();
      if(count($grupos) == 0){
        return response()->json(["message" => "Este docente no tiene grupos asignados"],404);
      }
      return response()->json($grupos);
    }
}
