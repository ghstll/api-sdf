<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  
  public function actividades(){
  }
  protected $table = 'grupos';

  protected $fillable = [
    'nombre',
    'docente_id' // docente que esta asignado al grupo
  ];
}
