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
        Schema::create('hechizos_personajes', function (Blueprint $table) {
            $table->integer('id_personaje');
            $table->integer('id_hechizo');

            $table->primary(['id_personaje', 'id_hechizo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hechizos_personajes');
    }
};
