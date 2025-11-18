<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
// ------------------------------------------------------------------------

Route::middleware('jwt:docente,admin,alumno')->group(function(){
  Route::get('me',[AuthController::class,'me']);
  Route::get('logout',[AuthController::class,'logout']);
  Route::get('refresh',[AuthController::class,'refresh']);
});

Route::delete('user/{id}',[UserController::class,'']);



Route::middleware('jwt:admin')->prefix('users')->group(function(){
  Route::get('',[UserController::class,'index']);
  Route::get('{id}',[UserController::class,'show']);
  Route::delete('{id}',[UserController::class,'destroy']);
});



Route::middleware('jwt:admin')->prefix('docentes')->group(function(){
  Route::get('',[DocenteController::class,'index']);
  Route::get('{id}',[DocenteController::class,'get_by_id']);
});

Route::prefix('alumnos')->group(function(){
  Route::get('',[AlumnoController::class,'get_all']);
});