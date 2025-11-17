<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Docente extends Authenticatable implements JWTSubject{
  use HasFactory,HasApiTokens;
  protected $table = 'docentes';
  public function getJWTIdentifier(){
    return $this->getKey(); // obtiene el valor del primary key del modelo (id) 
  }
  public function getJWTCustomClaims(){
    return [];
  }
  protected $fillable = [ //Definimos que campos se pueden agregar de forma masiva
    'nombre',
    'email',
    'telefono',
    'password'
  ];
  protected $hidden = ['password'];
}