<?php
try {
    $pdo = new PDO(
        'pgsql:host=ep-patient-dew-aegud69g-pooler.c-2.us-east-2.aws.neon.tech;port=5432;dbname=neondb',
        'neondb_owner',
        'npg_2RGe8WZzdxpv'
    );
    
    echo "=== TABLAS DISPONIBLES ===" . PHP_EOL;
    $stmt = $pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' ORDER BY table_name");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    foreach($tables as $table) {
        echo "- " . $table . PHP_EOL;
    }
    
    echo PHP_EOL . "=== CONTEO DE REGISTROS ===" . PHP_EOL;
    foreach($tables as $table) {
        try {
            $count = $pdo->query("SELECT COUNT(*) FROM {$table}")->fetchColumn();
            echo "{$table}: {$count} registros" . PHP_EOL;
        } catch (Exception $e) {
            echo "{$table}: Error - " . $e->getMessage() . PHP_EOL;
        }
    }
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage() . PHP_EOL;
}
