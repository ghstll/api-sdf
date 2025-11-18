<?php

namespace App;

enum RolUsuario : string
{
    case ADMIN = 'admin';
    case DOCENTE = 'docente';
    case ALUMNO = 'alumno';
}
