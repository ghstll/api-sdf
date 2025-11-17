<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Models\Docente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use SebastianBergmann\Environment\Console;

use function Pest\Laravel\json;

class DocenteController extends Controller{


  public function index()
  {
    return Docente::all();
  }
 
  public function store(StoreDocenteRequest $request){
    $validated = $request->validated();
    $validated['password'] = Hash::make($validated['password']);
    $docente = Docente::create($validated);
    return response()->json([
      'message' => 'Docente creado con exito',
      'entidad' => $docente
    ]);
  }

  public function show(string $id){
    $docente = Docente::find($id);
    if(!$docente) return response()->json(["message" => "No se encontro el docente"]);
    return response()->json($docente);
  }


  public function update(StoreDocenteRequest $request, string $id){
    $docente = Docente::find($id);
    if(!$docente){
      return response()->json([
        "message" => "No se encontro a ningun Docente con el ID : {$id}"
      ]);
    }
    $validated = $request->validated();
    $docente->update($validated);
    return response()->json([
      "message" => "Docente actualizado con exito",
    ]);
  }
 
  public function destroy(string $id){
    $docente = Docente::find($id);
    if(!$docente) return response()->json([],404);
    $docente->delete();
    return response()->json(["message" => "Docente eliminado con exito"],200);
  }
 
}
