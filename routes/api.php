<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/login')->group(function(){
  Route::get("/docente",[DocenteController::class,'loginDocente']);
});

Route::prefix('/docentes')->group(function(){
  Route::get('',[DocenteController::class,'index']); //GET ALL DOCENTES
  Route::get('{id}',[DocenteController::class,'show']); // GET DOCENTE BY ID
  Route::post('',[DocenteController::class,'store']); // CREATE A NEW DOCENTE
  Route::put('{id}',[DocenteController::class,'update']); //UPDATE DOCENTE
  Route::delete('{id}',[DocenteController::class,'destroy']); // DELETE DOCENTE
  Route::post('/login',[DocenteController::class,'LoginDocente']);
  
});


Route::prefix('/alumnos')->group(function(){
  // Insertar aqui las rutas de alumnos 
  // PENDIENTE:
  // CREAR CONTROLLER Y MODEL PARA EL ALUMNO
  //SI QUIERES PUEDEN 
});