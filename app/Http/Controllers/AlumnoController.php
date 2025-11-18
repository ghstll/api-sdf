<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
  public function get_all(){
    return User::where('rol','=','alumno')->get();
  }
}
