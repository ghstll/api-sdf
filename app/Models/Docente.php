<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Docente extends Authenticatable{
  use HasFactory,HasApiTokens;
  protected $table = 'docentes';
  protected $fillable = [ //Definimos que campos se pueden agregar de forma masiva
    'nombre',
    'email',
    'telefono',
    'password'
  ];
  // protected $guarded = ['id','is_admin'];
  // protected $hidden = ['password'];
}