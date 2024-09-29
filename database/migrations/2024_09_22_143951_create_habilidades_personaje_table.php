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
        Schema::create('habilidades_personaje', function (Blueprint $table) {
            $table->integer('id_personaje')->primary();
            $table->integer('atletismo')->nullable()->default(0);
            $table->integer('acrobacias')->nullable()->default(0);
            $table->integer('juego_de_manos')->nullable()->default(0);
            $table->integer('sigilo')->nullable()->default(0);
            $table->integer('arcano')->nullable()->default(0);
            $table->integer('historia')->nullable()->default(0);
            $table->integer('investigacion')->nullable()->default(0);
            $table->integer('naturaleza')->nullable()->default(0);
            $table->integer('religion')->nullable()->default(0);
            $table->integer('perspicacia')->nullable()->default(0);
            $table->integer('medicina')->nullable()->default(0);
            $table->integer('percepcion')->nullable()->default(0);
            $table->integer('supervivencia')->nullable()->default(0);
            $table->integer('trato_con_animales')->nullable()->default(0);
            $table->integer('engaño')->nullable()->default(0);
            $table->integer('interpretacion')->nullable()->default(0);
            $table->integer('intimidacion')->nullable()->default(0);
            $table->integer('persuasión')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades_personaje');
    }
};
