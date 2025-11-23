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
    Schema::create('grupos', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('nombre',length:3)->nullable(false);
      $table->foreignId('docente_id')->nullable(true)->constrained('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('grupos');
  }
};
