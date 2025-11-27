<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

use App\Models\Actividad;

// Crear nueva actividad de Cultura de Reciclaje
$actividad = Actividad::create([
    'titulo' => 'Cuestionario de Cultura de Reciclaje',
    'descripcion' => 'Aprende sobre la importancia del reciclaje y cómo contribuir a un planeta más limpio y sostenible.',
    'docente_id' => 35 // Mismo docente que la otra actividad
]);

echo "Actividad creada exitosamente:\n";
echo "ID: {$actividad->id}\n";
echo "Título: {$actividad->titulo}\n";
echo "Descripción: {$actividad->descripcion}\n";
echo "Docente ID: {$actividad->docente_id}\n";
