<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('/docentes')->group(function(){
  Route::get('',[DocenteController::class,'index']);
  Route::get('{id}',[DocenteController::class,'show']);
  Route::post('',[DocenteController::class,'store']);
  Route::put('{id}',[DocenteController::class,'update']);
  Route::delete('{id}',[DocenteController::class,'destroy']);
});