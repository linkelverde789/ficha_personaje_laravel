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
        Schema::table('usuarios_personajes', function (Blueprint $table) {
            $table->foreign(['id_personaje'], 'usuarios_personajes_id_personaje_fkey')->references(['id_personaje'])->on('personajes')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_usuario'], 'usuarios_personajes_id_usuario_fkey')->references(['id_usuario'])->on('usuarios')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios_personajes', function (Blueprint $table) {
            $table->dropForeign('usuarios_personajes_id_personaje_fkey');
            $table->dropForeign('usuarios_personajes_id_usuario_fkey');
        });
    }
};
