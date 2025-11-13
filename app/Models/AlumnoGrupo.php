<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoGrupo extends Model
{
  protected $fillable = [
    "alumno_id",
    "docente_id"
  ];
}
