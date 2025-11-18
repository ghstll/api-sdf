<?php

namespace App\Http\Controllers;

use App\Models\User;

class DocenteController extends Controller{
  public function get_by_id(string $id){
    $user =  User::where('rol','docente')
                  ->where('id',$id)
                  ->first();
    if(!$user) return response()->json(["message" => "No se encontro el docente con el ID {$id}"],404);
    return response()->json($user,200);
  }
  public function index(){
    return User::where('rol','=','docente')->get();
  }
}
