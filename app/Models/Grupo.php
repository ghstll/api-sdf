<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  public function actividades_grupo(){
   return $this->belongsToMany(Actividad::class, // modelo que relacionamos a el modelo Grupo
                        'actividades_grupo', // la tabla intermediara, que guarda la asignacion de actividades
                                              // a grupos, esta tabla guarda actividad_id y grupo_id
                        'grupo_id',  //llave foranea que apunta a el id de la tabla Grupos
                        'actividad_id'); // llave foranea que apunta ael id de la tabla Actividades
                      
                        //En SQL se veria algo asi:
                        //SELECT * FROM ACTIVIDADES
                        //JOIN ACTIVIDADES_GRUPO ON ACTIVIDADES.ID = ACTIVIDADES_GRUPO.ACTIVIDAD_ID
                        //WHERE ACTIVIDADES_GRUPO.GRUPO_ID = 1
  }
  protected $table = 'grupos';
  
  protected $fillable = [
    'nombre',
    'docente_id' // docente que esta asignado al grupo
  ];
}
