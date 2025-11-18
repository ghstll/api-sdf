<?php

use App\RolUsuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('nombre')->nullable(false);
            $table->text('email')->unique()->nullable(false);
            $table->string('telefono',length:10)->nullable(false)->unique();
            $table->enum('rol',array_column(RolUsuario::cases(),'value'))->default(RolUsuario::DOCENTE->value);
            $table->text('password')->nullable(false);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
