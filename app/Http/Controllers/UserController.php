<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller{


  public function index()
  {
    return User::all();
  }
 
  public function store(StoreUserRequest $request){
    $validated = $request->validated();
    $validated['password'] = Hash::make($validated['password']);
    $user = User::create($validated);
    return response()->json([
      'message' => 'Usuario creado con exito',
      'user' => $user
    ]);
  }

  public function show(string $id){
    $user = User::find($id);
    if(!$user) return response()->json(["message" => "No se encontro el usuario"]);
    return response()->json($user);
  }


  public function update(StoreUserRequest $request, string $id){
    $user = User::find($id);
    if(!$user){
      return response()->json([
        "message" => "No se encontro a ningun usuario con el ID : {$id}"
      ]);
    }
    $validated = $request->validated();
    $user->update($validated);
    return response()->json([
      "message" => "Usuario actualizado con exito",
    ]);
  }
 
  public function destroy(string $id){
    $user = User::find($id);
    if(!$user) return response()->json([],404);
    $user->delete();
    return response()->json(["message" => "Usuario eliminado con exito"],200);
  }
 




  public function getDocentes(){
    $docentes = User::where('rol','=','docente');
    return $docentes;
  }

}
