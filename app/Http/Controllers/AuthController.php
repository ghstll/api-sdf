<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller{

  //funcion para iniciar sesion
  public function login(LoginRequest $request){
    $request->validated();
    $credentials =  $request->only('email','password');
    $token = Auth::attempt($credentials);
    if(!$token) {
      return response()->json(
        ["message" => "Credenciales no validas"],
        401); //status code
    }
    $user = Auth::user();
    return response()->json([
      "message" => "Welcome back",
      "user" => $user,
      "auth" => [
        "token" => $token,
        "type" => "bearer"
      ]
      ]);
  }
  //funcion para traer la informacion del usuario que esta actualmente conectado
  public function me(){
    return response()->json(Auth::guard('users')->user());
  }
  //funcion para cerrar sesion
  public function logout(){
    Auth::logout();
    return response()->json([
      "message" => "Byee"
    ],200);
  }
  //funcino para refrescar el token
  public function refresh(){
    return response()->json([
      "message" => "Token refreshed",
      "user" => Auth::user(),
      "auth" => [
        "token" => Auth::refresh(),
        "type" => "bearer"
      ]
      ]);
  }

  public function register(StoreUserRequest $request){ // crea el usuario e inicia sesion automaticamente
    $dataValidated = $request->validated();
    $dataValidated['password'] = Hash::make($dataValidated['password']);
    $user = User::create($dataValidated);
    $token = Auth::attempt([
      'email' => $dataValidated['email'],
      'password' => $request->password
    ]);
    return response()->json([
      'message' => 'Usuario registrado con exito. Bienvenido',
      'user' => $user,
      'token' => $token
    ]);
  }

}
