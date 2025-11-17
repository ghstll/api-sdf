<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthDocenteController extends Controller{
  public function login(Request $request){
    $request->validate([
      "email" => "required|string|email",
      "password" => "required|string"
    ]);
    $credentials =  $request->only('email','password');
    $token = Auth::attempt($credentials);
    if(!$token) {
      return response()->json(
        ["message" => "Credenciales no validas"],
        401); //status code
    }
    $docente = Auth::user();
    return response()->json([
      "message" => "Welcome back",
      "docente" => $docente,
      "auth" => [
        "token" => $token,
        "type" => "bearer"
      ]
      ]);
  }
  public function me(){
    return response()->json(Auth::guard('docentes')->user());
  }
  public function logout(){
    Auth::logout();
    return response()->json([
      "message" => "Byee"
    ],200);
  }
  public function refresh(){
    return response()->json([
      "message" => "Token refreshed",
      "docente" => Auth::user(),
      "auth" => [
        "token" => Auth::refresh(),
        "type" => "bearer"
      ]
      ]);
  }
}
