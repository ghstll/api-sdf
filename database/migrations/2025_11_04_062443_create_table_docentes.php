<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration{
  public function up(): void{
    Schema::create('docentes', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->text('nombre')->nullable(false);
      $table->text('email')->unique(true)->nullable(false);
      $table->string('telefono',length:10)->nullable(false);
      $table->text('password')->nullable(false);
    });
  }
  /**
   * Reverse the migrations.
   */
  public function down():void{
    Schema::dropIfExists('docentes');
  }
};
