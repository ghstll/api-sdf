<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use Illuminate\Http\Request;
use App\Models\Docente;
use Illuminate\Support\Facades\Hash;



// TODO
//   GETALL - DONE (INDEX)
//   GETBYID - DONE (SHOW)
//   CREATE - DONE (STORE)
//   UPDATE - (EDIT)
//   DELETE -   (DESTROY)

class DocenteController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Docente::all();
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create() {}

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDocenteRequest $request){
    $validated = $request->validated();
    $validated['password'] = Hash::make($validated['password']);
    $docente = Docente::create($validated);
    return response()->json([
      'message' => 'Docente creado con exito',
      'entidad' => $docente 
    ]);
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id){
    $docente = Docente::find($id);
    if(!$docente) return response()->json(["message" => "No se encontro el docente"]);
    return response()->json($docente);
  } 

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id,Docente $docenteParam){
    
  }
  /**
   * Update the specified resource in storage.
   */
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
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id){
    $docente = Docente::find($id);
    if(!$docente) return response()->json(["message" => "No se encontro el docente"],404);
    $docente->delete();
    return response()->json(["message" => "Docente eliminado con exito"],200);
  }
  public function loginDocente(Request $request)
  {
    $email = $request->input("email");
    $password = $request->input("password");
    if(!$email || !$password) return response()->json(["message" => "Debes ingresar correo y contraseña"]);
    $docente = Docente::where('email',$email)->first();
    if(!$docente) return response()->json(["message" => "Email no asociado a ningun docente"]);
    if(!Hash::check($password,$docente->password)) return response()->json(["message" => "Email o Contraseña Incorrectos"]);
    return response()->json(["message" => "bienvenido"]);

    //hasta aqui el metodo autentifica la contraseña 
    //falta ver que debe hacer despues para poder acceseso al frotend 

  }
}
