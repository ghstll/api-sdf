<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
  
  public function index(Request $request){
    $rol = $request->query('rol');
    if(!$rol || $rol == "") return User::select('id','nombre','email','telefono','rol')->get();
    return User::where('rol',$rol)->select('id','nombre','email','telefono','rol')->orderBy('id','asc')->get();
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
    if(!$user) return response()->json(["message" => "No se encontro el usuario con el id {$id}"],404);
    return response()->json($user);
  }
  
  public function update(UpdateUserRequest $request, string $id){
    $user = User::find($id);
    if(!$user){
      return response()->json([
        "message" => "No se encontro a ningun usuario con el Id : {$id}"
      ],404);
    }
    $before_update = clone $user;
    $validated = $request->validated();
    $user->update($validated);
    return response()->json([
      "message" => "Usuario actualizado con exito",
      "before_update" => $before_update,
      "after_update" => $user
    ],200);
    return response()->json(["message" => "datos recibidos", "datos" => $request->all()]);
    // return response()->json([
    //   "datos_recibidos" => $request->all()
    // ]);
  }
  public function destroy(string $id){
    $user = User::find($id);
    if(!$user) return response()->json(["message" => "No se encontro el usuario con el id {$id}"],404);
    $user->delete();
    return response()->json(["message" => "Usuario eliminado con exito"],200);
  }
}
