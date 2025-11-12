<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // esta tabla guardara la informacion de que Alumnos estan registrados en que Grupos
        Schema::create('table_alumnos_grupos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('alumno_id')->constrained('alunmos');
            $table->foreignId('grupo_id')->constrained('grupos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_alumnos_grupos');
    }
};
