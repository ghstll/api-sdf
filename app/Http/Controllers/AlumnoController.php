<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Alumno::all();
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create() {}

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreAlumnoRequest $request){
    $validated = $request->validated();
    $validated['password'] = Hash::make($validated['password']);
    $alumno = Alumno::create($validated);
    return response()->json([
      'message' => 'Alumno creado con exito',
      'entidad' => $alumno
    ]);
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id){
    $alumno = Alumno::find($id);
    if(!$alumno) return response()->json(["message" => "No se encontro el alumno"]);
    return response()->json($alumno);
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id,Alumno $alumnoParam){
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(StoreAlumnoRequest $request, string $id){
    $alumno = Alumno::find($id);
    if(!$alumno){
      return response()->json([
        "message" => "No se encontro a ningun Alumno con el ID : {$id}"
      ]);
    }
    $validated = $request->validated();
    $alumno->update($validated);
    return response()->json([
      "message" => "Alumno actualizado con exito",
    ]);
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id){
    $alumno = Alumno::find($id);
    if(!$alumno) return response()->json(["message" => "No se encontro el alumno"],404);
    $alumno->delete();
    return response()->json(["message" => "Alumno eliminado con exito"],200);
  }
  public function loginAlumno(Request $request){
    // $email = $request->input("email");
    // $password = $request->input("password");
    // if(!$email || !$password) return response()->json(["message" => "Debes ingresar correo y contraseña"]); 
    // $alumno = Alumno::where('email',$email)->first();
    // if(!$alumno) return response()->json(["message" => "Email no asociado a ningun alumno"]);
    // if(!Hash::check($password,$alumno->password)) return response()->json(["message" => "Email o Contraseña Incorrectos"]);
    // session(['alumno_id' => $alumno->id]);
    // return response()->json(["message" => "bienvenido"]);

    // Con Auth ya se aplican las reglas de arriba

    $credentials = $request->only('email','password'); // del request obtenemos los campos email y password 
    // return response()->json(["crendentials" => $credentials]);
    if(Auth::guard('alumnos')->attempt($credentials)){ // en caso de que la autentificacion sea valida con las credenciales
      $alumno = Auth::guard('alumnos')->user(); // obtener el usuario que se acaba de autentificar
      $token = $request->user()->createToken('');
    }
  }
}
