<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoRequest;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller{
    public function index()
    {
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
}
