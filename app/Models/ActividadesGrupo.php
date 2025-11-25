<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadesGrupo extends Model
{
  protected $table = "actividades_grupo";
  protected $fillable = [
    "actividad_id",
    "grupo_id"
  ];
}
