<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

use App\Models\Actividad;

// Actualizar todas las actividades con título "prueba actividad"
$actividades = Actividad::where('titulo', 'prueba actividad')->get();

foreach ($actividades as $actividad) {
    $actividad->titulo = 'Cuestionario de Cuidado del Agua';
    $actividad->descripcion = 'Evalúa tus conocimientos sobre el cuidado y conservación del agua, recurso vital para la vida.';
    $actividad->save();
    echo "Actividad ID {$actividad->id} actualizada\n";
}

echo "Total de actividades actualizadas: " . $actividades->count() . "\n";
