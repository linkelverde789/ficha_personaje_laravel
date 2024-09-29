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
        Schema::create('ranurasbrujos', function (Blueprint $table) {
            $table->integer('nivel')->nullable();
            $table->integer('cantidad_ranuras')->nullable();
            $table->integer('nivel_maximo_hechizo')->nullable();
            $table->boolean('arcanum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranurasbrujos');
    }
};
