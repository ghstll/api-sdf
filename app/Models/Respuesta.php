<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
  public function pregunta(){
    return $this->belongsTo(Pregunta::class);
  }
}
