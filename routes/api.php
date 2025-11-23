<?php
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//Auth
//Estas rutas seran publicas y no estan protegidas por ningun middleware
// ya que cuando te vas a logear o registrar en la plataforma no cuentas con ningun token aun, y es por eso que es imposible
//autentificarse sin un token
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('jwt:docente,admin,alumno')->group(function(){
  Route::get('me',[AuthController::class,'me']);
  Route::get('logout',[AuthController::class,'logout']);
  Route::get('refresh',[AuthController::class,'refresh']);
});

Route::middleware('jwt:docente')->group(function(){
});

Route::delete('user/{id}',[UserController::class,'']);

//Este grupo de rutas estaran protegidos por el middleware jwt (definidio en el archivo JwtMiddleware.php) al cual
// se le pasa como argumento un rol, ese rol sera 'admin', por lo que solo los usuarios que tengan el rol
//admin podran usar los endpoints dentros de la agrupacion.

Route::middleware('jwt:admin')->group(function(){
  
  //De momento se sacaron las rutas del middleware para trabajar 
  //mas comodamente y no tener que autentificarse cada vez 
  // que queramos usar una ruta
});

Route::prefix('users')->group(function(){
  
  //Esta ruta recibe un query param : rol
  //Ejemplo como pasar el query param en la ruta:
  //http://127.0.0.1:8000/api/users?rol=docente
  Route::get('',[UserController::class,'index']); //Get all users

  Route::post('',[UserController::class,'store']); // Create a new user
  Route::get('{id}',[UserController::class,'show']); //Get user by id
  Route::put('{id}',[UserController::class,'update']); // Update user by id
  Route::delete('{id}',[UserController::class,'destroy']); // Delete user by id
});

Route::prefix('grupos')->group(function(){  
  Route::get('',[GrupoController::class,'index']);
  Route::get('{id}',[GrupoController::class,'show']);
  Route::post('',[GrupoController::class,'create']);
  Route::put('{id}',[GrupoController::class,'update']);
  Route::delete('{id}',[GrupoController::class,'delete']);
  Route::patch('removerdocente/{id}',[GrupoController::class,'removerDocenteDeGrupo']);
  Route::patch('asignardocente',[GrupoController::class,'asignarDocenteAGrupo']); // Esta ruta recibira un request body {grupo_id ,docente_id}
});


//Este grupo de rutas estaran protegidos por el middleware jwt (definidio en el archivo JwtMiddleware.php) al cual
// se le pasa como argumento un rol, ese rol sera 'admin', por lo que solo los usuarios que tengan el rol
//admin podran usar los endpoints dentros de la agrupacion
