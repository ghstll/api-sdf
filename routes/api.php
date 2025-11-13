<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AlumnoController;
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
Route::prefix('/alumnos')->group(function(){
  Route::get('',[AlumnoController::class,'index']); //GET ALL ALUMNOS
  Route::get('{id}',[AlumnoController::class,'show']); // GET ALUMNO BY ID
  Route::post('',[AlumnoController::class,'store']); // CREATE A NEW ALUMNO
  Route::put('{id}',[AlumnoController::class,'update']); //UPDATE ALUMNO
  Route::delete('{id}',[AlumnoController::class,'destroy']); // DELETE ALUMNO
  Route::post('/login',[AlumnoController::class,'LoginAlumno']); //LOGIN ALUMNO
});