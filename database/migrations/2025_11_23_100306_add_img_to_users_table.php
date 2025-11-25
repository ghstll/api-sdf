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
        $img_url_default = asset("storage/user_default_pfp.jpg");
        Schema::table('users', function (Blueprint $table) use ($img_url_default) {
          $table->text('img_url')->default($img_url_default);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('img_url');
        });
    }
};
