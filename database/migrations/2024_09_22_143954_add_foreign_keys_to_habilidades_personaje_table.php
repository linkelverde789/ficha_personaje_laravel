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
        Schema::table('habilidades_personaje', function (Blueprint $table) {
            $table->foreign(['id_personaje'], 'habilidades_personaje_id_personaje_fkey')->references(['id_personaje'])->on('personajes')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('habilidades_personaje', function (Blueprint $table) {
            $table->dropForeign('habilidades_personaje_id_personaje_fkey');
        });
    }
};
