<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model{
  use HasFactory;
  protected $table = 'docentes';
  protected $fillable = [ //Definimos que campos se pueden agregar de forma masiva
    'nombre',
    'email',
    'telefono',
    'password'
  ];
  protected $guarded = ['id','is_admin'];
}