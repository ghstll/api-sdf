<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== USUARIOS ADMIN ===" . PHP_EOL;
$admins = User::where('rol', 'admin')->get(['id', 'nombre', 'email']);
foreach($admins as $admin) {
    echo "ID: {$admin->id} | {$admin->nombre} | {$admin->email}" . PHP_EOL;
}

echo PHP_EOL . "=== PROBANDO LOGIN ===" . PHP_EOL;
$email = 'braulio@gmail.com';
$password = 'admincont';

$user = User::where('email', $email)->first();
if (!$user) {
    echo "❌ Usuario con email {$email} NO existe" . PHP_EOL;
} else {
    echo "✅ Usuario encontrado: {$user->nombre}" . PHP_EOL;
    
    if (Hash::check($password, $user->password)) {
        echo "✅ Contraseña CORRECTA" . PHP_EOL;
    } else {
        echo "❌ Contraseña INCORRECTA" . PHP_EOL;
        echo "Intenta crear un nuevo usuario con:" . PHP_EOL;
        echo "php artisan tinker --execute=\"App\Models\User::where('email', '{$email}')->delete(); App\Models\User::create(['nombre' => 'braulio_admin', 'email' => '{$email}', 'password' => bcrypt('{$password}'), 'telefono' => '4811438582', 'rol' => 'admin']);\"" . PHP_EOL;
    }
}
