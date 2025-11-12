<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// /api/
Route::prefix('/login')->group(function(){
  Route::get("/docente",[DocenteController::class,'loginDocente']);
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
  //rutas para los grupos
});
Route::prefix('/actividades')->group(function(){
// rutas para las actividades
  // TODO
  // crear actividad
  // get actividades
  // get actividad por id
  // actualizar actividad
  // eliminar actividad
});
Route::prefix('/preguntas')->group(function(){
  //rutas para las preguntas
  // TODO
  // traer preguntas todas las preguntas de una actividad (por id de actividad)
  // eliminar todas las preguntas de una actividad 
});
Route::prefix('/respuestas')->group(function(){
  // rutas para las respuestas
});
Route::prefix('/alumnos')->group(function(){
});