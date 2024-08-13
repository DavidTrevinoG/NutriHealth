<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('colaciones', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('comentario', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('comentario_de_comentario', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('dietas', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('ejercicios', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('ingredientes', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('publicacion', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('tipo_ejercicio', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('colaciones', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('comentario', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('comentario_de_comentario', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('dietas', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('ejercicios', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('ingredientes', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('publicacion', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('tipo_ejercicio', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
