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
        Schema::table('hechizos_personajes', function (Blueprint $table) {
            $table->foreign(['id_hechizo'], 'hechizos_personajes_id_hechizo_fkey')->references(['id'])->on('hechizos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_personaje'], 'hechizos_personajes_id_personaje_fkey')->references(['id_personaje'])->on('personajes')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hechizos_personajes', function (Blueprint $table) {
            $table->dropForeign('hechizos_personajes_id_hechizo_fkey');
            $table->dropForeign('hechizos_personajes_id_personaje_fkey');
        });
    }
};
