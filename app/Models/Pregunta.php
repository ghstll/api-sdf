<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Actividad;
use App\Models\Respuesta;
class Pregunta extends Model{ 
  protected $fillable = ['actividad_id','enunciado'];
  public function actividad(){  
    return $this->belongsTo(Actividad::class);
  }
  public function respuestas(){
    return $this->hasMany(Respuesta::class);
  }
}
