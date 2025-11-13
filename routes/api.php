<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// /api/
Route::prefix('/login')->group(function(){
  Route::get("/docente",[DocenteController::class,'loginDocente']);
  Route::get("/alumno",[AlumnoController::class,'loginAlumno']);
});
Route::prefix('/docentes')->group(function(){
  Route::get('',[DocenteController::class,'index']); //GET ALL DOCENTES
  Route::get('{id}',[DocenteController::class,'show']); // GET DOCENTE BY ID
  Route::post('',[DocenteController::class,'store']); // CREATE A NEW DOCENTE
  Route::put('{id}',[DocenteController::class,'update']); //UPDATE DOCENTE
  Route::delete('{id}',[DocenteController::class,'destroy']); // DELETE DOCENTE
  Route::post('/login',[DocenteController::class,'LoginDocente']); //LOGIN DOCENTE
});


Route::prefix('/grupos')->group(function(){
  Route::get('',[GrupoController::class,'index']); 
  Route::get('{id}',[GrupoController::class,'show']); 
  Route::post('',[GrupoController::class,'store']);
  Route::put('{id}',[GrupoController::class,'update']);
  Route::delete('{id}',[GrupoController::class,'destroy']);
});

Route::prefix('/alumnos')->group(function(){
  Route::get('',[AlumnoController::class,'index']); //GET ALL ALUMNOS
  Route::get('{id}',[AlumnoController::class,'show']); // GET ALUMNO BY ID
  Route::post('',[AlumnoController::class,'store']); // CREATE A NEW ALUMNO
  Route::put('{id}',[AlumnoController::class,'update']); //UPDATE ALUMNO
  Route::delete('{id}',[AlumnoController::class,'destroy']); // DELETE ALUMNO
  Route::post('/login',[AlumnoController::class,'LoginAlumno']); //LOGIN ALUMNO
});

Route::prefix('/actividades')->group(function(){
  Route::get('',[ActividadController::class,'index']); 
  Route::get('{id}',[ActividadController::class,'show']); 
  Route::post('',[ActividadController::class,'store']); 
  Route::put('{id}',[ActividadController::class,'update']);
  Route::delete('{id}',[ActividadController::class,'destroy']);
});


Route::prefix('/preguntas')->group(function(){
  Route::get('',[PreguntaController::class,'index']);
  Route::get('{id}',[PreguntaController::class,'show']);
  Route::post('',[PreguntaController::class,'store']);
  Route::put('{id}',[PreguntaController::class,'update']);
  Route::delete('{id}',[PreguntaController::class,'destroy']); 
});

Route::prefix('/respuestas')->group(function(){
  Route::get('',[RespuestaController::class,'index']);
  Route::post('',[RespuestaController::class,'store']); 
  Route::put('{id}',[RespuestaController::class,'update']); 
  Route::delete('{id}',[RespuestaController::class,'destroy']); 
});
