<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  public function preguntas(){
    return $this->hasMany(Pregunta::class);  
  }
  
  protected $table = "actividades";
  protected $fillable = [
    "docente_id",
    "titulo",
    "descripcion"
  ];
}
