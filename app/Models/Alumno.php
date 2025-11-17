<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = 'alumnos';
    
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'password'
    ];
    public function grupo(){
      return $this->belongsTo(Grupo::class);
    }
    // protected $hidden = ['password'];
}
