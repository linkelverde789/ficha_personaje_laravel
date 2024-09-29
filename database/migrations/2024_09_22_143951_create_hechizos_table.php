<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hechizos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('nivel')->default(0);
            $table->text('descripcion')->nullable();
            $table->string('daño', 50)->nullable();
            $table->string('distancia', 50)->nullable();
            $table->string('tiempo_carga', 50)->nullable();
            $table->string('duracion', 50)->nullable();
            $table->string('componentes', 100)->nullable();
        });
        DB::statement("alter table \"hechizos\" add column \"tipo\" tipo_hechizo not null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hechizos');
    }
};
