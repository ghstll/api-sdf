<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoGrupo extends Model{
  protected $table = "alumnos_grupos";
  protected $fillable = [
    "alumno_id",
    "grupo_id"
  ];
}
