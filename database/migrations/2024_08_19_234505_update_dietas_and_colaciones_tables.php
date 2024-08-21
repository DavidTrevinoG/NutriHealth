<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dietas', function (Blueprint $table) {
            $table->string('calorias')->nullable();
        });
    
        Schema::table('colaciones', function (Blueprint $table) {
            $table->dropColumn('calorias');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dietas', function (Blueprint $table) {
            $table->dropColumn('calorias');
        });
    
        Schema::table('colaciones', function (Blueprint $table) {
            $table->string('calorias')->nullable();
        });
    }
};
