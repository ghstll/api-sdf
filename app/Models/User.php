<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject{
  use HasFactory,HasApiTokens;
  protected $table = 'users';
  public function grupo(){
    return $this->hasOne(Grupo::class,'docente_id');
  }
  public function alumno_grupo(){
    return $this->hasOne(AlumnoGrupo::class,'alumno_id');
  }
  public function getJWTIdentifier(){
    return $this->getKey(); // obtiene el valor del primary key del modelo (id) 
  }
  public function getJWTCustomClaims(){
    return [];
  }
  public function grupoComoAlumno(){
    return $this->hasOneThrough(
      Grupo::class,        // Modelo final
      AlumnoGrupo::class,  // Modelo pivote
      'alumno_id',         // FK en alumnos_grupos que apunta a users.id
      'id',                // PK en grupos
      'id',                // PK en users
      'grupo_id'           // FK en alumnos_grupos que apunta a grupos.id
    );
  }


  protected $fillable = [ //Definimos que campos se pueden agregar de forma masiva
    'nombre',
    'email',
    'telefono',
    'password',
    'rol',
    'img_url'
  ];
  protected $hidden = ['password','created_at','updated_at'];
}